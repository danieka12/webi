<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentsRequest;
use App\Http\Requests\CourseRequest;
use App\Models\Angket;
use App\Models\GabungMateri;
use App\Models\Guru;
use App\Models\Komentar;
use App\Models\Materi;
use App\Models\MateriCoverGambar;
use App\Models\OpsiMateri;
use App\Models\Penulis;
use App\Models\TujuanPembelajaran;

use Carbon\Carbon;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CourseController extends Controller
{

    private $locationImage = "images/upload";

    private function getId(string $params)
    {
        return explode(".", $params)[1];
    }

    private function hasEnroll(?String $materiId, ?String $siswaId)
    {
        $hasEnroll = false;
        if ($siswaId) {
            $gabungMateri = GabungMateri::where('materi_id', $materiId)->where('siswa_id', $siswaId)->first();
            if ($gabungMateri) $hasEnroll = true;
        }
        return $hasEnroll;
    }


    private function imageHandler(?string $path)
    {
        if (isset($path)) {
            $img = Image::make(public_path() . "/" . $path);
            return [
                'name' => explode("/", $path)[2],
                'size' => $img->filesize(),
                'type' => $img->mime,
            ];
        }
    }

    private function strLimit(string $str, $limit = 15)
    {
        return Str::limit($str, $limit, $end = "...");
    }

    private function revertSlug(string $slug)
    {
        return Str::title(str_replace('-', ' ', $slug));
    }

    private function splitDuration(string $duration, bool $withDurationHour = false, bool $withDurationMinute = false)
    {
        if ($withDurationHour) {
            return explode(" ", $duration)[0];
        }
        if ($withDurationMinute) {
            return explode(" ", $duration)[2];
        }

        return 0;
    }

    private function href(string $prefix, string $slug, bool $withId = false, string $id = null)
    {
        if ($withId) {
            return $prefix . Str::slug($slug) . "." . $id;
        }

        return $prefix . Str::slug($slug);
    }

    private function transformDate($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }

    public function detail($slug)
    {
        $user = Auth::guard("siswa")->check() ? Auth::guard("siswa")->user()->id : false;
        $courseId = $this->getId($slug);
        $course = Materi::with(["penulis.guru.mengajar.materi", "opsiMateri", 'tujuanPembelajaran'])->withCount(['gabungMateri as gabung_materi_count' => function ($query) {
            $query->where('konfirmasi_gabung', '=', true);
        }])->where("id", $courseId)->first();

        $gabungMateri = GabungMateri::query()
            ->where("siswa_id", $user)
            ->where("materi_id", $course->id)->first();

        $metaData = [
            'duration' => $course['durasi'],
            'takeBy' => $course['gabung_materi_count'],
            'category' => $this->strLimit($course['opsiMateri']['judul'], 10),
            'content' => $course['tujuanPembelajaran']['description'],
            'title' => $course['judul'],
            'href' =>  $this->href("/materi/baca/", $course['judul'], true, $course['id']),
            'guru' => [
                'id' => $course['penulis']['guru']['id'],
                'name' => $course['penulis']['guru']['name'],
                'description' => $course['penulis']['description'],
                'profile' => $course['penulis']['foto_profile'],
                'field' => collect($course['penulis']['guru']['mengajar'])->map(function ($field) {
                    return $field['materi']['judul'];
                })
            ],
            'hasTaken' => $user ? !is_null(GabungMateri::query()
                ->where("siswa_id", $user)
                ->where("materi_id", $course->id)->first()) : $user,
            'hasConfirm' => $user && isset($gabungMateri['konfirmasiGabung']) ? $gabungMateri['konfirmasi_gabung'] : $user,
            'slug' => $slug,
        ];

        return view('course-detail')->with($metaData);
    }

    public function joinCourse(Request $request)
    {
        $validated = $request->validate([
            'slug' => 'required',
            'user_id' => 'required',
        ]);



        $joinCourse = new GabungMateri;
        $courseId = $this->getId($validated['slug']);
        $guruId = Materi::with('penulis.guru')->where("id", '=', $courseId)->first()['penulis']['guru']['id'];

        // check if this user has been joined before
        if (!empty(GabungMateri::where('materi_id',  $courseId)->where("siswa_id", $validated['user_id'])->first())) {
            return response()->json(["success" => false, "msg" => "Anda sudah mengambil materi ini", "hasTaked" => true], 400);
        }

        $joinCourse['guru_id'] = $guruId;
        $joinCourse['siswa_id'] = $validated['user_id'];
        $joinCourse['materi_id'] = $courseId;
        $joinCourse['konfirmasi_gabung'] = false;
        $joinCourse->save();

        return response()->json(["success" => true, "joined" => true]);
    }

    public function filterCourseByLabel(string $label)
    {
        $opsiMateri = [];
        $courseList = [];
        $siswaId = false;
        $courseLabelList = collect(OpsiMateri::limit(8)->get())->map(function ($query) {
            return [
                'id' => $query['id'],
                'title' => $this->strLimit($query['judul'], 10)
            ];
        });

        if (Auth::guard('siswa')->check()) {
            $siswaId = Auth::guard('siswa')->user()->id;
        }

        if ($label != "semua") {
            $opsiMateri = OpsiMateri::with("materi.materiCoverGambar")->where('judul', 'LIKE', "%" . $this->revertSlug($label) . "%")->first();

            $courseList = collect($opsiMateri['materi'])->map(function ($courseList) use ($opsiMateri, $siswaId) {
                return  [
                    'courseLabel' => $opsiMateri['judul'],
                    'title' => $courseList['judul'],
                    'desc' => $courseList['konten'],
                    'timeToComplete' => $courseList['durasi'],
                    'previewImage' => $courseList['materiCoverGambar']['cover'],
                    'href' =>  $this->href('materi/detail/', $courseList['judul'], true, $courseList['id']),
                    'hasEnroll' => $this->hasEnroll($courseList['id'], $siswaId)
                ];
            });
        } else {
            $opsiMateri = OpsiMateri::with("materi.materiCoverGambar")->get();
            $courseListDB = Materi::with(["materiCoverGambar", "opsiMateri"])->get();
            $courseList = collect($courseListDB)->map(function ($courseList) use ($siswaId) {
                return  [
                    'courseLabel' => $courseList['opsiMateri']['judul'],
                    'title' => $courseList['judul'],
                    'desc' => $courseList['konten'],
                    'timeToComplete' => $courseList['durasi'],
                    'previewImage' => $courseList['materiCoverGambar']['cover'],
                    'href' =>  $this->href('materi/detail/', $courseList['judul'], true, $courseList['id']),
                    'hasEnroll' => $this->hasEnroll($courseList['id'], $siswaId)
                ];
            });
        }

        return view('course')->with(['labelTitle' => !isset($opsiMateri['judul']) ? "Semua" : $opsiMateri['judul'], 'courseList' => $courseList, 'courseLabelList' => $courseLabelList]);
    }



    public function search(Request $request)
    {
        $label = $request->query('q');
        $materi = [];
        $courseList = [];
        $siswaId = false;
        $courseLabelList = collect(OpsiMateri::limit(8)->get())->map(function ($query) {
            return [
                'id' => $query['id'],
                'title' => $this->strLimit($query['judul'], 10)
            ];
        });

        $materi = Materi::with(["materiCoverGambar", "opsiMateri"])->where('judul', 'LIKE', "%" . $label . "%")->get();

        if (Auth::guard('siswa')->check()) {
            $siswaId = Auth::guard('siswa')->user()->id;
        }


        $courseList = collect($materi)->map(function ($materi) use ($siswaId) {


            return  [
                'courseLabel' => $materi['opsiMateri']['judul'],
                'title' => $materi['judul'],
                'desc' => $materi['konten'],
                'timeToComplete' => $materi['durasi'],
                'previewImage' => $materi['materiCoverGambar']['cover'],
                'href' =>  $this->href('materi/detail/', $materi['judul'], true, $materi['id']),
                'hasEnroll' => $this->hasEnroll($materi['id'], $siswaId)
            ];
        });

        return view('course')->with(['labelTitle' => $label, 'courseList' => $courseList, 'courseLabelList' => $courseLabelList]);
    }

    public function uploadImage(Request $request)
    {
        $image = $request->file('file');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path($this->locationImage), $imageName);
        return response()->json(['success' => $imageName]);
    }

    public function uploadImageURLHandler(Request $request)
    {
        $request->validate([
            'url' => 'required',
        ]);

        return response()->json([
            'success' => 1,
            'file' => [
                'url' => $request->input("url")
            ]
        ]);
    }

    public function uploadImageHandler(Request $request)
    {
        $request->validate([
            'image.*' => 'mimes:doc,pdf,docx,zip,jpeg,png,jpg,gif,svg',
        ]);


        $imageName = "";
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path($this->locationImage), $imageName);

            return response()->json([
                'success' => 1,
                'file' => [
                    'url' => asset($this->locationImage . "/" . $imageName),
                ]
            ]);
        } else {
            return response()->json([
                'success' => 0,
                'file' => []
            ]);
        }
    }

    public function readCourse(string $slug)
    {
        $courseId = $this->getId($slug);
        $userId = Auth::guard('siswa')->user()->id;
        $toRead = Materi::with([
            'materiCoverGambar',
            'opsiMateri',
            'komentar.penulis.guru',
            'komentar.siswa',
            'komentar.balasKomentar',
            'komentar.balasKomentar.penulis.guru',
            'komentar.balasKomentar.siswa',
            'penulis.guru'
        ])->where("id", $courseId)->firstOrFail();

        $angketModel = Angket::where('materi_id', $courseId)->where('siswa_id', $userId)->first();
        $hasFillSurvey = false;

        if (!empty($angketModel)) {
            $hasFillSurvey = true;
        }

        $collectionToRead =
            [
                'id' => $toRead['id'],
                'teacherId' => $toRead['penulis']['guru']['id'],
                'title' => $toRead['judul'],
                'label' => $toRead['opsiMateri']['judul'],
                'coverImage' => $toRead['materiCoverGambar']['judul'],
                'createdAt' => $this->transformDate($toRead['comments']),
                'teacher' => $toRead['penulis']['guru']['name'],
                'hasFillSurvey' => $hasFillSurvey,
                'slug' => $slug,
                'comments' => collect($toRead['komentar'])->map(function ($comment) {
                    return [
                        'id' => $comment['id'],
                        'author' => isset($comment['penulis']) ? $comment['penulis']['guru']['name'] : $comment['siswa']['name'],
                        'author_id' => isset($comment['penulis']) ? $comment['penulis']['id'] : $comment['siswa']['id'],
                        'role' => isset($comment['penulis']) ? 'teacher' : 'student',
                        'content' => $comment['konten'],
                        'postAt' => $this->transformDate($comment['created_at']),
                        'reply' => collect($comment['balasKomentar'])->map(function ($reply) {
                            return [
                                'id' => $reply['id'],
                                'author' => isset($reply['penulis']) ? $reply['penulis']['guru']['name'] : $reply['siswa']['name'],
                                'author_id' => isset($reply['penulis']) ? $reply['penulis']['id'] : $reply['siswa']['id'],
                                'role' => isset($reply['penulis']) ? 'teacher' : 'student',
                                'content' => $reply['konten'],
                                'postAt' => $this->transformDate($reply['created_at']),
                            ];
                        })
                    ];
                }),
                'content' => $toRead['konten'],
                "coverImage" => $toRead['materiCoverGambar']['cover'],
            ];

        return view('course-read')->with(['toRead' => $collectionToRead]);
    }

    public function destroy(Request $request)
    {
        $courseId = $request->get('courseId');
        $courseBeDeleted = Materi::query()->where('id', $courseId)->firstOrFail();

        // delete course
        $courseBeDeleted->delete();
        return redirect()->route("guru.course")->with(['msg' => "Materi berhasil dihapus!"]);
    }

    public function update(CourseRequest $request)
    {
        $course = $request->validated();
        $courseModel = Materi::findOrFail($request->materiId);
        $courseMeta = TujuanPembelajaran::query()->where('materi_id', $request->materiId)->firstOrFail();
        $courseMateriCoverGambar = MateriCoverGambar::query()->where('materi_id', $request->materiId)->firstOrFail();

        // TODO: Update the course
        $courseModel['opsi_materi_id'] = $request->categoryId;
        $courseModel['penulis_id'] = Guru::with("penulis")->where("id", $request->guruId)->first()["penulis"]["id"];
        $courseModel->durasi = $course['durationHour']  . " Jam " . $course['durationMinute'] . " Menit";
        $courseModel->judul = $course['title'];
        $courseModel->konten = $this->base64Processing($course['content']);
        $courseModel->save();


        // TODO: Update the courseMeta
        $courseMeta['materi_id'] = $courseModel->id;
        $courseMeta['guru_id'] = $request->guruId;
        $courseMeta->description = $this->base64Processing($course['description']);
        $courseMeta->save();


        // TODO: Update the materiCoverGambar
        $courseMateriCoverGambar['materi_id'] = $courseModel->id;
        $courseMateriCoverGambar->cover = $this->locationImage  . "/" . $request->image;
        $courseMateriCoverGambar->save();

        return redirect()->route("guru.course")->with(['msg' => "Materi berhasil diubah!"]);
    }

    private function durationHandler(?string $hour, ?string $minute)
    {
        if (isset($hour)) {
            return $hour  . " Jam " . $minute . " Menit";
        } else {
            return $minute . " Menit";
        }
        if (isset($minute)) {
            return $hour  . " Jam " . $minute . " Menit";
        } else {
            return $hour  . " Jam ";
        }
        return false;
    }

    public function base64Processing($description)
    {
        $dom = new DOMDocument();
        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $k => $img) {
            $data = $img->getAttribute('src');
            $extension = explode('/', mime_content_type($data))[1];
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $imageName = time() . $k . '.' . $extension;
            $path = public_path($this->locationImage . "/" . $imageName);
            file_put_contents($path, $data);
            $img->removeAttribute('src');
            $img->setAttribute('src', asset($this->locationImage . "/" . $imageName));
        }

        return $dom->saveHTML();
    }


    public function create(CourseRequest $request)
    {
        $course = $request->validated();
        $courseModel = new Materi;
        $courseMeta = new TujuanPembelajaran;
        $materiCoverGambar = new MateriCoverGambar;

        $duration = $this->durationHandler($course['durationHour'], $course['durationMinute']);
        if (!$duration) {
            return view("admin.course-form")->with(['title' => 'Tambah Materi']);
        }
        $courseModel['opsi_materi_id'] = $request->categoryId;
        $courseModel['penulis_id'] = Guru::with("penulis")->where("id", $request->guruId)->first()["penulis"]["id"];
        $courseModel->durasi = $duration;
        $courseModel->judul = $course['title'];
        $courseModel->konten = $course['content'];
        $courseModel->save();

        $courseMeta['materi_id'] = $courseModel->id;
        $courseMeta['guru_id'] = $request->guruId;
        $courseMeta->description = $course['description'];
        $courseMeta->save();

        $materiCoverGambar['materi_id'] = $courseModel->id;
        $materiCoverGambar->cover = $this->locationImage  . "/" . $request->image;
        $materiCoverGambar->save();

        return redirect()->route("guru.course")->with(['msg' => "Materi berhasil dibuat!"]);
    }


    public function edit(Request $request, string $materiId)
    {
        $course = Materi::with(["materiCoverGambar", 'tujuanPembelajaran', 'opsiMateri'])->where('id', $materiId)->firstOrFail();
        $image = $this->imageHandler($course['materiCoverGambar']->cover);
        $transformCourse = [
            'id' => $course->id,
            'title' => $course->judul,
            'durationHour' => $this->splitDuration($course->durasi, true, false),
            'durationMinute' => $this->splitDuration($course->durasi, false, true),
            'description' => $course->tujuanPembelajaran->description,
            'category' => [
                'id' => $course->opsiMateri->id,
                'value' => $course->opsiMateri->judul
            ],
            'image' => [
                'name' => $image['name'] ?? "",
                'size' => $image['size'] ?? "",
                'type' => $image['type'] ?? "",
                'coverUrl' => $course['materiCoverGambar']->cover ?? ""
            ],
            'content' => $course->konten
        ];
        return view("admin.course-form")->with(['data' => $transformCourse, 'title' => 'Edit Materi']);
    }

    public function comments(CommentsRequest $request)
    {
        $comments = $request->validated();
        $commentInstance = new Komentar;

        $course = Materi::where('id', $comments['courseId'])->firstOrFail();
        $writer = "";

        if (isset($comment['teacherId'])) {
            $writer = Penulis::query()->where('guru_id', $comments['teacherId'])->firstOrFail();
            $commentInstance['penulis_id'] = $writer->id;
        } else {
            $commentInstance['siswa_id'] = $comments['studentId'];
        }

        $commentInstance['materi_id'] = $comments['courseId'];
        $commentInstance['konten'] = $comments['comments'];
        $commentInstance->save();

        return redirect()->back();
    }
}

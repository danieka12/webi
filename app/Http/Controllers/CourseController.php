<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\GabungMateri;
use App\Models\Guru;
use App\Models\Materi;
use App\Models\MateriCoverGambar;
use App\Models\OpsiMateri;
use App\Models\TujuanPembelajaran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CourseController extends Controller
{

    private $locationImage = "images/upload";

    private function getId(string $params)
    {
        return explode(".", $params)[1];
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

        $metaData = [
            'duration' => $course['durasi'],
            'takeBy' => $course['gabung_materi_count'],
            'category' => $this->strLimit($course['opsiMateri']['judul'], 10),
            'content' => $course['tujuanPembelajaran']['description'],
            'title' => $course['judul'],
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
        $courseLabelList = collect(OpsiMateri::limit(8)->get())->map(function ($query) {
            return [
                'id' => $query['id'],
                'title' => $this->strLimit($query['judul'], 10)
            ];
        });

        if ($label != "semua") {
            $opsiMateri = OpsiMateri::with("materi.materiCoverGambar")->where('judul', 'LIKE', "%" . $this->revertSlug($label) . "%")->first();

            $courseList = collect($opsiMateri['materi'])->map(function ($courseList) use ($opsiMateri) {
                return  [
                    'courseLabel' => $opsiMateri['judul'],
                    'title' => $courseList['judul'],
                    'desc' => $courseList['konten'],
                    'timeToComplete' => $courseList['durasi'],
                    'previewImage' => 'http://via.placeholder.com/450x333/ccc/fff/ course__list_1.jpg',
                    'href' =>  $this->href('materi/detail/', $courseList['judul'], true, $courseList['id']),
                    'hasEnroll' => false
                ];
            });
        } else {
            $opsiMateri = OpsiMateri::with("materi.materiCoverGambar")->get();
            $courseListDB = Materi::with(["materiCoverGambar", "opsiMateri"])->limit(9)->get();
            $courseList = collect($courseListDB)->map(function ($courseList) {
                return  [
                    'courseLabel' => $courseList['opsiMateri']['judul'],
                    'title' => $courseList['judul'],
                    'desc' => $courseList['konten'],
                    'timeToComplete' => $courseList['durasi'],
                    'previewImage' => 'http://via.placeholder.com/450x333/ccc/fff/ course__list_1.jpg',
                    'href' =>  $this->href('materi/detail/', $courseList['judul'], true, $courseList['id']),
                    'hasEnroll' => false
                ];
            });
        }

        return view('course')->with(['labelTitle' => !isset($opsiMateri['judul']) ? "Semua" : $opsiMateri['judul'], 'courseList' => $courseList, 'courseLabelList' => $courseLabelList]);
    }

    public function uploadImage(Request $request)
    {
        $image = $request->file('file');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path($this->locationImage), $imageName);
        return response()->json(['success' => $imageName]);
    }

    public function readCourse(string $slug)
    {
        $courseId = $this->getId($slug);
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

        $collectionToRead =
            [
                'title' => $toRead['judul'],
                'label' => $toRead['opsiMateri']['judul'],
                'createdAt' => $this->transformDate($toRead['comments']),
                'teacher' => $toRead['penulis']['guru']['name'],
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


    public function create(CourseRequest $request)
    {
        $course = $request->validated();
        $courseModel = new Materi;
        $courseMeta = new TujuanPembelajaran;
        $materiCoverGambar = new MateriCoverGambar;


        $courseModel['opsi_materi_id'] = $request->categoryId;
        $courseModel['penulis_id'] = Guru::with("penulis")->where("id", $request->guruId)->first()["penulis"]["id"];
        $courseModel->durasi = $course['durationHour']  . " Jam " . $course['durationMinute'] . " Menit";
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
            'content' => $course->konten
        ];
        return view("admin.course-form")->with(['data' => $transformCourse, 'title' => 'Edit Materi']);
    }
}

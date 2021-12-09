<?php

namespace App\Http\Controllers;

use App\Models\GabungMateri;
use App\Models\Materi;
use App\Models\OpsiMateri;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
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
            'slug' => $slug,
        ];

        return view('course-detail')->with($metaData);
    }

    public function joinCourse(Request $request)
    {
        $validated = $request->validate([
            'slug' => 'required',
            'userId' => 'required',
        ]);

        $joinCourse = new GabungMateri;
        $courseId = $this->getId($validated['slug']);
        $guruId = Materi::with('penulis')->where("id", '=', $courseId)->first()['guru_id'];

        $joinCourse->guruId = $guruId;
        $joinCourse->siswaId = $validated['userId'];
        $joinCourse->materiId = $courseId;
        $joinCourse->konfirmasiGabung = false;
        $joinCourse->save();

        return view('course-detail')->with(['hasJoin' => false]);
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
                    'desc' => 'Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.',
                    'timeToComplete' => $courseList['durasi'],
                    'previewImage' => 'http://via.placeholder.com/450x333/ccc/fff/ course__list_1.jpg',
                    'href' =>  $this->href('materi/detail/', $courseList['judul'], true, $courseList['id']),
                    'hasEnroll' => false
                ];
            });
        }

        return view('course')->with(['labelTitle' => $opsiMateri['judul'], 'courseList' => $courseList, 'courseLabelList' => $courseLabelList]);
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

        // return  response()->json($collectionToRead);
        return view('course-read')->with(['toRead' => $collectionToRead]);
    }
}

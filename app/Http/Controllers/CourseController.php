<?php

namespace App\Http\Controllers;

use App\Models\GabungMateri;
use App\Models\Materi;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    private function getId(string $params)
    {
        return explode(".", $params)[1];
    }

    private function strLimit(string $str)
    {
        return Str::limit($str, $limit = 15, $end = "...");
    }

    public function detail($slug)
    {
        $courseId = $this->getId($slug);
        $course = Materi::with(["penulis.guru", "opsiMateri"])->withCount(['gabungMateri as gabung_materi_count' => function ($query) {
            $query->where('konfirmasi_gabung', '=', true);
        }])->where("id", $courseId)->first();


        $metaData = [
            'duration' => "2 Jam 30 Menit",
            'takeBy' => $course['gabung_materi_count'],
            'category' => $this->strLimit($course['opsiMateri']['judul']),
            'content' => $course['konten'],
            'title' => $course['judul'],
            'guru' => [
                'name' => $course['penulis']['guru']['name'],
                'description' => $course['penulis']['description'],
                'profile' => $course['penulis']['foto_profile'],
            ]
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
}

<?php

namespace App\Http\Controllers;

use App\Models\Materi;
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

    public function detail(Request $request, $slug)
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
}

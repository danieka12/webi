<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\OpsiMateri;
use Illuminate\Support\Str;


class HomepageController extends Controller
{

    private function href(string $prefix, string $slug, bool $withId = false, string $id = null)
    {
        if ($withId) {
            return $prefix . Str::slug($slug) . "." . $id;
        }

        return $prefix . Str::slug($slug);
    }

    public function index()
    {
        $courseLabel = collect(OpsiMateri::all()->take(5))->map(function ($courseLabel) {
            return [
                'title' => $courseLabel['judul'],
                'href' => $this->href('materi/', $courseLabel['judul']),
            ];
        });
        $courseList = collect(Materi::with(["opsiMateri", "materiCoverGambar"])->take(15)->get())->map(function ($courseList) {
            return  [
                'courseLabel' => $courseList['opsiMateri']['judul'],
                'title' => $courseList['judul'],
                'desc' => $courseList['konten'],
                'timeToComplete' => '1h 30min',
                'previewImage' => 'http://via.placeholder.com/800x533/ccc/fff/ course__list_1.jpg',
                'href' =>  $this->href('materi/detail/', $courseList['judul'], true, $courseList['id']),
                'hasEnroll' => false
            ];
        });
        $courseCategory = collect(OpsiMateri::take(6)->withCount('materi')->get())->map(function ($courseCategory) {
            return [
                'title' => $courseCategory['judul'],
                'metaTitle' =>  $courseCategory['materi_count'] . ' Materi Tersedia',
                'href' => $this->href('materi/', $courseCategory['judul']),
                'previewImage' => 'http://via.placeholder.com/450x533/ccc/fff/course_1.jpg'
            ];
        });
        $newsAndEventData = [['title' => 'Pri oportere scribentur eu', 'desc' => 'Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....', 'author' => 'Admin Webi', 'dateTime' => '12-01-2022', 'href' => '#0', 'meta' => ['imagePreview' => 'http://via.placeholder.com/500x333/ccc/fff/news_home_1.jpg', 'date' => 28, 'month' => 'Dec']], ['title' => 'Pri oportere scribentur eu', 'desc' => 'Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....', 'author' => 'Admin Webi', 'dateTime' => '12-01-2022', 'href' => '#0', 'meta' => ['imagePreview' => 'http://via.placeholder.com/500x333/ccc/fff/news_home_1.jpg', 'date' => 28, 'month' => 'Dec']], ['title' => 'Pri oportere scribentur eu', 'desc' => 'Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....', 'author' => 'Admin Webi', 'dateTime' => '12-01-2022', 'href' => '#0', 'meta' => ['imagePreview' => 'http://via.placeholder.com/500x333/ccc/fff/news_home_1.jpg', 'date' => 28, 'month' => 'Dec']], ['title' => 'Pri oportere scribentur eu', 'desc' => 'Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....', 'author' => 'Admin Webi', 'dateTime' => '12-01-2022', 'href' => '#0', 'meta' => ['imagePreview' => 'http://via.placeholder.com/500x333/ccc/fff/news_home_1.jpg', 'date' => 28, 'month' => 'Dec']]];

        return view('home')->with([
            'courseLabel' => $courseLabel,
            'populars' => $courseList,
            'categories' => $courseCategory,
            'newsAndEvents' => $newsAndEventData,
            'howManyCourse' => Materi::all()->count(),
        ]);
    }
}

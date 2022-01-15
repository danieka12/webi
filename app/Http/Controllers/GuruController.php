<?php

namespace App\Http\Controllers;

use App\Models\Guru as ModelsGuru;
use App\Models\Materi;
use App\Models\Penulis;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function detailTeacher(string $id)
    {
        $teacher = ModelsGuru::with(['penulis.materi.gabungMateri', 'mengajar'])->where('id', $id)->get();
    }

    private function transformDate($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }

    public function listCourse()
    {
        $teacherId = Auth::guard("guru")->user()->id;
        $writerCourse = Penulis::query()->where("guru_id", $teacherId)->first();
        $course = Materi::query()->where("penulis_id", $writerCourse->id)->with(["penulis", "materiCoverGambar"])->orderBy("created_at", "desc")->get();
        return view('admin.course')->with(['courses' => collect($course)->map(function ($course) {
            return [
                'id' => $course->id,
                'title' => $course->judul,
                'dateTime' => $this->transformDate($course->createdAt),
                'cover' => $course->materiCoverGambar->cover,
                'description' => $course->konten,
                'duration' => $course->durasi
            ];
        })]);
    }
}

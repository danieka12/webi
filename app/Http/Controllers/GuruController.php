<?php

namespace App\Http\Controllers;

use App\Models\Guru as ModelsGuru;
use Illuminate\Http\Request;

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
}

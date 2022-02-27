<?php

namespace App\Http\Controllers;

use App\Models\OpsiMateri;
use Illuminate\Http\Request;

const SUBJECT_COURSE = [
    'Matematika',
    'Bahasa Indonesia',
    'Bahasa Inggris',
    'Sains',
    'Fisika',
    'Kimia',
    'desain pemodelan dan informasi bangunan',
    'teknik audio video',
    'teknik instalasi tenaga listrik',
    'teknik pemesinan',
    'teknik kendaraan ringan otomatif',
    'rekayasa perangkat lunak',
    'teknik pengelasan',
    'kewirausahaan',
];

class PopulateDataController extends Controller
{
    public function optionCategory()
    {
        foreach (SUBJECT_COURSE as $title) {
            $optionMateri = new OpsiMateri;

            $optionMateri->judul = $title;
            $optionMateri->save();
        }
        return response()->json(['ok' => true]);
    }
}

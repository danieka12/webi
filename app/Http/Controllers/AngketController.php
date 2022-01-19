<?php

namespace App\Http\Controllers;

use App\Http\Requests\Angket as AngketRequest;
use App\Models\Angket;

class AngketController extends Controller
{
    public function store(AngketRequest $request)
    {
        $validated = $request->validated();
        $angket = new Angket();

        $angket['guru_id'] = $validated['guruId'];
        $angket['siswa_id'] = $validated['siswaId'];
        $angket['materi_id'] = $validated['materiId'];
        $angket['kejelasan_pembelajaran'] = $validated['kejelasanPembelajaran'];
        $angket['kelengkapan_materi'] = $validated['kelengkapanMateri'];
        $angket['contoh_penjelasan'] = $validated['contohKejelasan'];
        $angket['kejelasan_bahasa'] = $validated['kejelasanBahasa'];
        $angket['pemahaman_materi'] = $validated['pemahamanMateri'];
        $angket['kemudahan_pemakaian'] = $validated['kemudahanPemakaian'];
        $angket->save();

        // return view;
    }
}

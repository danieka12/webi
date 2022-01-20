<?php

namespace App\Http\Controllers;

use App\Http\Requests\Angket as AngketRequest;
use App\Http\Controllers\CourseController;
use App\Models\Angket;
use App\Models\Penulis;

class AngketController extends Controller
{
    private function transformData(String $choose): bool
    {
        if ($choose == "on") return true;
        return false;
    }
    public function store(AngketRequest $request)
    {
        $validated = $request->validated();
        $angket = new Angket();
        $writer = Penulis::query()->where('guru_id',  $validated['guruId'])->firstOrFail();

        $angket['penulis_id'] = $writer->id;
        $angket['siswa_id'] = $validated['siswaId'];
        $angket['materi_id'] = $validated['materiId'];
        $angket['kejelasan_pembelajaran'] = $this->transformData($validated['kejelasanMateri']);
        $angket['kelengkapan_materi'] = $this->transformData($validated['kelengkapanMateri']);
        $angket['contoh_penjelasan'] = $this->transformData($validated['contohPenjelasan']);
        $angket['kejelasan_bahasa'] = $this->transformData($validated['kejelasanBahasa']);
        $angket['pemahaman_materi'] = $this->transformData($validated['pemahamanMateri']);
        $angket['kemudahan_pemakaian'] = $this->transformData($validated['kemudahanPemakaian']);
        $angket->save();

        return redirect()->action([CourseController::class, 'readCourse'], ["slug" => $validated['slug']]);
    }
}

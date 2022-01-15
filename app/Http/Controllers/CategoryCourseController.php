<?php

namespace App\Http\Controllers;

use App\Models\OpsiMateri;
use Illuminate\Http\Request;

class CategoryCourseController extends Controller
{
    public function index(Request $request)
    {
        // $categories = [];

        // if ($request->has('q')) {
        //     $search = $request->q;
        //     $categories = OpsiMateri::select("id", "judul")
        //         ->where('judul', 'LIKE', "%$search%")
        //         ->get();
        // }
        // return response()->json($categories);

        $categories = OpsiMateri::all();
        return response()->json($categories);
    }
}

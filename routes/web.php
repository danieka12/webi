<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\GuruAuthController;
use App\Http\Controllers\HomepageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", [HomepageController::class, 'index'])->name("homepage");

Route::name("course.")->group(function () {
    Route::get("/materi/baca/{slug}", [CourseController::class, 'readCourse'])->name('read');
    Route::get('/materi/{label?}', [CourseController::class, 'filterCourseByLabel'])->name('search');
    Route::get('/materi/detail/{slug}', [CourseController::class, 'detail'])->name('detail');
    Route::get("/materi/gabung/{slug}", function () {
        return view('take-course');
    })->name('join');
    Route::post("/materi/gabung", [CourseController::class, 'joinCourse'])->name('join.post');
});

Route::name("teacher.")->group(function () {
    Route::get("/guru/detail/{id}", function () {
        return view('teacher-detail');
    })->name('profile');
});

Route::name('auth.')->group(function () {
    Route::get("/login", function () {
        return view('auth.siswa.login');
    })->name('login');

    Route::get("/daftar", function () {
        return view('auth.siswa.register');
    })->name('register');

    Route::get('/logout', function () {
        return "Logout";
    });
});

Route::get("/tentang-peneliti", function () {
    return view('about-author');
});


/*
|--------------------------------------------------------------------------
| Guru Route
|--------------------------------------------------------------------------
*/
Route::prefix("guru")->name('guru.')->group(function () {
    /*
|--------------------------------------------------------------------------
| Not-Protecting Route
|--------------------------------------------------------------------------
*/
    Route::group(['middleware' => ['guest']], function () {
        /**
         * Register Routes
         */
        Route::get('/daftar', [GuruAuthController::class, 'showRegister'])->name('register.show');
        Route::post('/register', [GuruAuthController::class, 'register'])->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', [GuruAuthController::class, 'showLogin'])->name('login.show');
        Route::post('/login', [GuruAuthController::class, 'login'])->name('login.perform');
    });

    /*
|--------------------------------------------------------------------------
| Protecting Route
|--------------------------------------------------------------------------
*/
    Route::group(['middleware' => ['auth']], function () {
        /**
         * Logout Routes
         */
        Route::get('/logout', [GuruAuthController::class, 'logout'])->name('logout.perform');
    });
});

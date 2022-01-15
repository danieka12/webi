<?php

use App\Http\Controllers\CategoryCourseController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GuruAuthController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Models\GabungMateri;
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

    Route::get('/materi/{label?}', [CourseController::class, 'filterCourseByLabel'])->name('search');
    Route::get('/materi/detail/{slug}', [CourseController::class, 'detail'])->name('detail');
    Route::get("/materi/gabung/{slug}", function () {
        return view('take-course');
    })->name('join');

    // authenticated route
    Route::middleware(['auth:siswa'])->group(function () {
        Route::get("/materi/baca/{slug}", [CourseController::class, 'readCourse'])->name('read');
        Route::post("/materi/gabung", [CourseController::class, 'joinCourse'])->name('join.post');
    });
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
    Route::post('/login', [SiswaController::class, 'login'])->name('login.post');

    Route::get("/daftar", function () {
        return view('auth.siswa.register');
    })->name('register');
    Route::post('/daftar', [SiswaController::class, 'register'])->name('register.post');

    Route::get('/logout', [SiswaController::class, 'perform'])->name('logout');
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
        Route::get('/masuk', [GuruAuthController::class, 'showLogin'])->name('login.show');
        Route::post('/login', [GuruAuthController::class, 'login'])->name('login.perform');
    });

    /*
|--------------------------------------------------------------------------
| Protecting Route
|--------------------------------------------------------------------------
*/

    Route::middleware(['auth:guru'])->group(function () {
        Route::get("/", function () {
            $sizeOfNewConfirm = GabungMateri::query()->where("konfirmasi_gabung", 0)->get();
            return view('admin.dashboard')->with(['sizeConfirm' => count($sizeOfNewConfirm)]);
        })->name("dashboard");

        Route::get("/konfirmasi", [GuruController::class, "confirmStudent"])->name("confirmStudent");

        Route::get("/materi/tambah", function () {
            return view("admin.add-course");
        })->name("addCourse");

        Route::get("/profil", function () {
            return view('admin.teacher');
        })->name("teacher");


        /**
         * Materi Route
         */
        Route::post('/materi/delete', [CourseController::class, 'destroy'])->name('course.delete');
        Route::post('/materi', [CourseController::class, 'create'])->name('course.create');
        Route::post("/materi/image/upload", [CourseController::class, 'uploadImage'])->name('course.uploadImage');
        Route::get("/materi", [GuruController::class, 'listCourse'])->name('course');

        Route::get('/categories', [CategoryCourseController::class, 'index'])->name('categories');

        /**
         * Logout Routes
         */
        Route::get('/logout', [GuruAuthController::class, 'logout'])->name('logout.perform');
    });
});

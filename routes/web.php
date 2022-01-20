<?php

use App\Http\Controllers\AngketController;
use App\Http\Controllers\CategoryCourseController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GuruAuthController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
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

    // authenticated route
    Route::middleware(['auth:siswa'])->group(function () {
        Route::get("/materi/baca/{slug}", [CourseController::class, 'readCourse'])->name('read');
        Route::post("/materi/gabung", [CourseController::class, 'joinCourse'])->name('join.post');
        Route::post('/komentar', [CourseController::class, 'comments'])->name('comments.create');
        Route::post('/angket', [AngketController::class, 'store'])->name('angket.create');
    });
});

Route::name("teacher.")->group(function () {
    Route::get("/guru/detail/{id}", [GuruController::class, 'detail'])->name('profile');
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
})->name('aboutAuthor');


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
        Route::get("/", [GuruController::class, 'dashboard'])->name("dashboard");



        Route::get("/materi/tambah", function () {
            return view("admin.course-form")->with(['title' => 'Tambah Materi']);
        })->name("addCourse");
        Route::get("/materi/edit/{materiId}", [CourseController::class, "edit"])->name("editCourse");



        /**
         * Materi Route
         */
        Route::post('/materi/delete', [CourseController::class, 'destroy'])->name('course.delete');
        Route::post('/materi', [CourseController::class, 'create'])->name('course.create');
        Route::put("/materi", [CourseController::class, 'update'])->name('course.update');
        Route::post("/materi/image/upload", [CourseController::class, 'uploadImage'])->name('course.uploadImage');
        Route::get("/materi", [GuruController::class, 'listCourse'])->name('course');

        Route::get('/categories', [CategoryCourseController::class, 'index'])->name('categories');

        /**
         * Siswa Route
         */
        Route::get("/konfirmasi", [GuruController::class, "confirmStudent"])->name("confirmStudent");
        Route::post("/konfirmasi/siswa", [GuruController::class, "confirmation"])->name('confirmationStudent');

        /**
         * Guru Route
         */
        Route::get("/profil", [GuruController::class, 'show'])->name("teacher");
        Route::post("/profil", [GuruController::class, 'update'])->name('teacher.update');

        /**
         * Logout Routes
         */
        Route::get('/logout', [GuruAuthController::class, 'logout'])->name('logout.perform');
    });
});

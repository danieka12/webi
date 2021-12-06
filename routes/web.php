<?php

use App\Http\Controllers\GuruAuthController;
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

Route::get('/', function () {
    $popularData = [['courseLabel' => 'category', 'title' => 'Persius delenit has cu', 'desc' => 'Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.', 'timeToComplete' => '1h 30min', 'previewImage' => 'http://via.placeholder.com/800x533/ccc/fff/ course__list_1.jpg', 'href' => 'course-detail.html', 'hasEnroll' => true], ['courseLabel' => 'category', 'title' => 'Persius delenit has cu', 'desc' => 'Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.', 'timeToComplete' => '1h 30min', 'previewImage' => 'http://via.placeholder.com/800x533/ccc/fff/ course__list_1.jpg', 'href' => 'course-detail.html', 'hasEnroll' => false], ['courseLabel' => 'category', 'title' => 'Persius delenit has cu', 'desc' => 'Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.', 'timeToComplete' => '1h 30min', 'previewImage' => 'http://via.placeholder.com/800x533/ccc/fff/ course__list_1.jpg', 'href' => 'course-detail.html', 'hasEnroll' => false], ['courseLabel' => 'category', 'title' => 'Persius delenit has cu', 'desc' => 'Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.', 'timeToComplete' => '1h 30min', 'previewImage' => 'http://via.placeholder.com/800x533/ccc/fff/ course__list_1.jpg', 'href' => 'course-detail.html', 'hasEnroll' => false], ['courseLabel' => 'category', 'title' => 'Persius delenit has cu', 'desc' => 'Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.', 'timeToComplete' => '1h 30min', 'previewImage' => 'http://via.placeholder.com/800x533/ccc/fff/ course__list_1.jpg', 'href' => 'course-detail.html', 'hasEnroll' => false]];
    $categoryData = [['title' => 'Arts and Humanities', 'metaTitle' => '15 Programmes', 'href' => '#0', 'previewImage' => 'http://via.placeholder.com/450x533/ccc/fff/course_1.jpg'], ['title' => 'Engineering', 'metaTitle' => '15 Programmes', 'href' => '#0', 'previewImage' => 'http://via.placeholder.com/450x533/ccc/fff/course_1.jpg'], ['title' => 'Architecture', 'metaTitle' => '15 Programmes', 'href' => '#0', 'previewImage' => 'http://via.placeholder.com/450x533/ccc/fff/course_1.jpg'], ['title' => 'Science and Biology', 'metaTitle' => '15 Programmes', 'href' => '#0', 'previewImage' => 'http://via.placeholder.com/450x533/ccc/fff/course_1.jpg'], ['title' => 'Law and Criminology', 'metaTitle' => '15 Programmes', 'href' => '#0', 'previewImage' => 'http://via.placeholder.com/450x533/ccc/fff/course_1.jpg'], ['title' => 'Medical', 'metaTitle' => '15 Programmes', 'href' => '#0', 'previewImage' => 'http://via.placeholder.com/450x533/ccc/fff/course_1.jpg']];
    return view('home')->with(['populars' => $popularData, 'categories' => $categoryData]);
});

Route::get("/materi/baca/{slug}", function () {
    return view("course-read");
});

Route::get('/materi', function () {
    return view('course');
});

Route::get('/materi/{id}', function () {
    return view('course-detail');
});

Route::get("/detail/guru/{id}", function () {
    return view('teacher-detail');
});


/*
|--------------------------------------------------------------------------
| Guru Route
|--------------------------------------------------------------------------
*/
Route::name('guru.')->group(function () {
    /*
|--------------------------------------------------------------------------
| Not-Protecting Route
|--------------------------------------------------------------------------
*/
    Route::group(['middleware' => ['guest']], function () {
        /**
         * Register Routes
         */
        Route::get('/register', [GuruAuthController::class, 'showRegister'])->name('register.show');
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

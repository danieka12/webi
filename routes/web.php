<?php

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

// Route::get('/', function () {
//     $popularData = [['courseLabel' => 'category', 'title' => 'Persius delenit has cu', 'desc' => 'Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.', 'timeToComplete' => '1h 30min', 'previewImage' => 'http://via.placeholder.com/800x533/ccc/fff/ course__list_1.jpg', 'href' => 'materi/detail/persius-delenit-has-cu', 'hasEnroll' => true], ['courseLabel' => 'category', 'title' => 'Persius delenit has cu', 'desc' => 'Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.', 'timeToComplete' => '1h 30min', 'previewImage' => 'http://via.placeholder.com/800x533/ccc/fff/ course__list_1.jpg', 'href' => 'materi/detail/persius-delenit-has-cu', 'hasEnroll' => false], ['courseLabel' => 'category', 'title' => 'Persius delenit has cu', 'desc' => 'Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.', 'timeToComplete' => '1h 30min', 'previewImage' => 'http://via.placeholder.com/800x533/ccc/fff/ course__list_1.jpg', 'href' => 'materi/detail/persius-delenit-has-cu', 'hasEnroll' => false], ['courseLabel' => 'category', 'title' => 'Persius delenit has cu', 'desc' => 'Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.', 'timeToComplete' => '1h 30min', 'previewImage' => 'http://via.placeholder.com/800x533/ccc/fff/ course__list_1.jpg', 'href' => 'materi/detail/persius-delenit-has-cu', 'hasEnroll' => false], ['courseLabel' => 'category', 'title' => 'Persius delenit has cu', 'desc' => 'Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.', 'timeToComplete' => '1h 30min', 'previewImage' => 'http://via.placeholder.com/800x533/ccc/fff/ course__list_1.jpg', 'href' => 'materi/detail/persius-delenit-has-cu', 'hasEnroll' => false]];
//     $categoryData = [['title' => 'Arts and Humanities', 'metaTitle' => '15 Programmes', 'href' => 'materi/engineering', 'previewImage' => 'http://via.placeholder.com/450x533/ccc/fff/course_1.jpg'], ['title' => 'Engineering', 'metaTitle' => '15 Programmes', 'href' => 'materi/engineering', 'previewImage' => 'http://via.placeholder.com/450x533/ccc/fff/course_1.jpg'], ['title' => 'Architecture', 'metaTitle' => '15 Programmes', 'href' => 'materi/engineering', 'previewImage' => 'http://via.placeholder.com/450x533/ccc/fff/course_1.jpg'], ['title' => 'Science and Biology', 'metaTitle' => '15 Programmes', 'href' => 'materi/engineering', 'previewImage' => 'http://via.placeholder.com/450x533/ccc/fff/course_1.jpg'], ['title' => 'Law and Criminology', 'metaTitle' => '15 Programmes', 'href' => 'materi/engineering', 'previewImage' => 'http://via.placeholder.com/450x533/ccc/fff/course_1.jpg'], ['title' => 'Medical', 'metaTitle' => '15 Programmes', 'href' => 'materi/engineering', 'previewImage' => 'http://via.placeholder.com/450x533/ccc/fff/course_1.jpg']];
//     $newsAndEventData = [['title' => 'Pri oportere scribentur eu', 'desc' => 'Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....', 'author' => 'Mark Twain', 'dateTime' => '20-11-2017', 'href' => '#0', 'meta' => ['imagePreview' => 'http://via.placeholder.com/500x333/ccc/fff/news_home_1.jpg', 'date' => 28, 'month' => 'Dec']], ['title' => 'Pri oportere scribentur eu', 'desc' => 'Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....', 'author' => 'Mark Twain', 'dateTime' => '20-11-2017', 'href' => '#0', 'meta' => ['imagePreview' => 'http://via.placeholder.com/500x333/ccc/fff/news_home_1.jpg', 'date' => 28, 'month' => 'Dec']], ['title' => 'Pri oportere scribentur eu', 'desc' => 'Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....', 'author' => 'Mark Twain', 'dateTime' => '20-11-2017', 'href' => '#0', 'meta' => ['imagePreview' => 'http://via.placeholder.com/500x333/ccc/fff/news_home_1.jpg', 'date' => 28, 'month' => 'Dec']], ['title' => 'Pri oportere scribentur eu', 'desc' => 'Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....', 'author' => 'Mark Twain', 'dateTime' => '20-11-2017', 'href' => '#0', 'meta' => ['imagePreview' => 'http://via.placeholder.com/500x333/ccc/fff/news_home_1.jpg', 'date' => 28, 'month' => 'Dec']]];
//     return view('home')->with(['populars' => $popularData, 'categories' => $categoryData, 'newsAndEvents' => $newsAndEventData]);
// });


Route::get("/", [HomepageController::class, 'index'])->name("homepage");

Route::get("/materi/baca/{slug}", function () {
    return view("course-read");
});

Route::get('/materi/{label?}', function () {
    return view('course');
});

Route::get('/materi/detail/{id}', function () {
    return view('course-detail');
});

Route::get("/guru/detail/{id}", function () {
    return view('teacher-detail');
});

Route::get("/materi/gabung/{slug}", function () {
    return view('take-course');
});

Route::get("/login", function () {
    return view('auth.siswa.login');
});

Route::get("/daftar", function () {
    return view('auth.siswa.register');
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

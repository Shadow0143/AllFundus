<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


// Route::get('/', function () {
//     return view('welcome');
// });



// ++++++++++++++++++=======================   Common Routes Start =========================+++++++++++++++++++++++


Route::get('/', [App\Http\Controllers\CommonController::class, 'index'])->name('fanduwelcome');

Route::prefix('vineet-agarwala')->group(function () {
    Route::get('/', [App\Http\Controllers\CommonController::class, 'index'])->name('vineetwelcome');
});

Route::prefix('kamal-kalra')->group(function () {
    Route::get('/', [App\Http\Controllers\CommonController::class, 'index'])->name('kamalwelcome');
});


Route::get('/google/login', [App\Http\Controllers\GoogleController::class, 'redirectToGoogle'])->name('redirectToGoogle');
Route::any('/google/callback', [App\Http\Controllers\GoogleController::class, 'test'])->name('test');



Route::get('/post-details/{id}', [App\Http\Controllers\CommonController::class, 'postDetails'])->name('fandupostDetails');
Route::get('/type/{type}', [App\Http\Controllers\HomeController::class, 'filterByposts'])->name('fandufilterByposts');
Route::get('/tag/{type}', [App\Http\Controllers\HomeController::class, 'filterByTag'])->name('filterByTag');
Route::get('/category/{type}', [App\Http\Controllers\HomeController::class, 'filterByCategory'])->name('filterByCategory');



Route::get('/{segment}/post-details/{id}', [App\Http\Controllers\CommonController::class, 'postDetails'])->name('segmentpostDetails');
Route::get('/{segment}/type/{type}', [App\Http\Controllers\HomeController::class, 'filterByposts'])->name('segmentfilterByposts');
Route::get('/{segment}/tag/{type}', [App\Http\Controllers\HomeController::class, 'filterByTag'])->name('segmentfilterByTag');
Route::get('/{segment}/category/{type}', [App\Http\Controllers\HomeController::class, 'filterByCategory'])->name('segmentfilterByCategory');
Route::get('/{segment}/intrest-details/{id}', [App\Http\Controllers\HomeController::class, 'intrestDetails'])->name('intrestDetails');


Route::post('/add-intrest', [App\Http\Controllers\HomeController::class, 'addIntrest'])->name('addIntrest');

Route::post('/create-post', [App\Http\Controllers\PostController::class, 'createPost'])->name('createPost');
Route::post('/send-comment', [App\Http\Controllers\CommentController::class, 'sendComment'])->name('sendComment');
Route::get('/delete-comment', [App\Http\Controllers\CommentController::class, 'deletesComment'])->name('deletesComment');
Route::post('/send-reply', [App\Http\Controllers\CommentController::class, 'sendReply'])->name('sendReply');
Route::post('/submit-tag', [App\Http\Controllers\MainController::class, 'submitTag'])->name('submitTag');
Route::get('/post-likes', [App\Http\Controllers\HomeController::class, 'likes'])->name('likes');
Route::get('/delete-post', [App\Http\Controllers\HomeController::class, 'deletePost'])->name('deletePost');
Route::post('/submit-testimonial', [App\Http\Controllers\MainController::class, 'submitTestimonial'])->name('submitTestimonial');
Route::post('/submit-contents', [App\Http\Controllers\MainController::class, 'submitContents'])->name('submitContents');






// ++++++++++++++++++=======================   Common Routes End ============================+++++++++++++++++++++++




Auth::routes();




Route::get('/blogs', [App\Http\Controllers\BlogsController::class, 'index'])->name('blogs');
Route::get('/dashboard', [App\Http\Controllers\admin\DashboardContoller::class, 'dashboard'])->name('dashboard');
Route::get('/html-editor', [App\Http\Controllers\admin\DashboardContoller::class, 'htmlEditor'])->name('htmlEditor');
Route::post('/create-section', [App\Http\Controllers\admin\SectionContoller::class, 'createSection'])->name('createSection');
Route::post('/create-section-item', [App\Http\Controllers\admin\SectionContoller::class, 'createSectionItem'])->name('createSectionItem');
Route::get('/edit-section-api', [App\Http\Controllers\admin\ApiContoller::class, 'editSectionApi'])->name('editSectionApi');




Route::get('/testimonial-detail/{slug}/{id}', [App\Http\Controllers\MainController::class, 'testimonialDetail'])->name('testimonialDetail');
Route::get('/read-feature/{slug}', [App\Http\Controllers\MainController::class, 'viewFeatures'])->name('viewFeatures');
Route::get('/read-about-us', [App\Http\Controllers\MainController::class, 'readAboutUs'])->name('readAboutUs');
Route::get('/why-me', [App\Http\Controllers\MainController::class, 'whyMe'])->name('whyMe');
Route::get('/blogs', [App\Http\Controllers\MainController::class, 'blogs'])->name('blogs');
Route::get('/our-sites', [App\Http\Controllers\MainController::class, 'ourSites'])->name('ourSites');
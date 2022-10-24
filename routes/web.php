<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CollageController;

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
//     return view('welcome');
// });



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', function () {
    return view('index');
})->middleware(['auth'])->name('/');

Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/photo/{id}', [HomeController::class, 'viewPhotoDetails'])->name('view-photo-details');
Route::get('/photos', [HomeController::class, 'allPhotos'])->name('all-photos');


Route::middleware(['auth'])->group(function () {
    //category
    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories');
    Route::get('/admin/add/category', [CategoryController::class, 'create'])->name('admin.add-category');
    Route::post('/admin/category/add', [CategoryController::class, 'storeCategory'])->name('admin.storeCategory');
    Route::get('/admin/category/edit/{id}', [CategoryController::class, 'editCategory'])->name('admin.editCategory');
    Route::put('/admin/category/edit/{id}', [CategoryController::class, 'updateCategory'])->name('admin.updateCategory');
    Route::get('/admin/category/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('admin.deleteCategory');

    //photo
    Route::get('/admin/photos', [GalleryController::class, 'index'])->name('admin.photos');
    Route::get('/admin/photo/add', [GalleryController::class, 'create'])->name('admin.add-photo');
    Route::post('/admin/photo/add', [GalleryController::class, 'storePhoto'])->name('admin.store-photo');
    Route::get('/admin/photo/edit/{id}', [GalleryController::class, 'editPhoto'])->name('admin.edit-photo');
    Route::put('/admin/photo/update/{id}', [GalleryController::class, 'updatePhoto'])->name('admin.update-photo');
    Route::delete('/admin/photo/edit/delete-sub-image/{id}', [GalleryController::class, 'deleteSubImage'])->name('admin.deleteSubImage');
    Route::delete('/admin/photo/delete/{id}', [GalleryController::class, 'deletePhoto'])->name('admin.deletePhoto');
    Route::get('/admin/photo/photo-detail/{id}', [GalleryController::class, 'viewPhoto'])->name('admin.view-photo');

    //collage
    Route::get('/admin/collages', [CollageController::class, 'index'])->name('admin.collages');
    Route::get('/admin/add/collage', [CollageController::class, 'create'])->name('admin.add-collage');
    Route::post('/admin/collage/add', [CollageController::class, 'storeCollage'])->name('admin.storeCollage');
    Route::get('/admin/collage/edit/{id}', [CollageController::class, 'editCollage'])->name('admin.edit-collage');
    Route::put('/admin/collage/edit/{id}', [CollageController::class, 'updateCollage'])->name('admin.update-collage');
    Route::delete('/admin/collage/delete/{id}', [CollageController::class, 'deleteCollage'])->name('admin.deleteCollage');
});

require __DIR__.'/auth.php';

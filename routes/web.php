<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/category/index',[CategoryController::class,'index']);
Route::get('/categories',[CategoryController::class,'viewAll']);
Route::post('/category/create',[CategoryController::class,'store']);
Route::put('/category/update/{id}',[CategoryController::class,'update']);
Route::delete('/category/delete/{id}',[CategoryController::class,'delete']);
Route::get('/category/sum/',[CategoryController::class,'sum']);

Auth::routes();
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/categoriesWithLogin',[CategoryController::class,'viewAll']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

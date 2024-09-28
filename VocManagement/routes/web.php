<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FacultyController;
use App\Http\Controllers\Admin\EventController;




Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/faculty', [FacultyController::class, 'store'])->name('faculty.store');
});

require __DIR__.'/auth.php';

Route::middleware(['auth','userMiddleware'])->group(function(){
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth','adminMiddleware'])->group(function(){
    Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('/admin/faculty', [FacultyController::class, 'index'])->name('admin.faculty.index');
    Route::get('/admin/faculty/create', [FacultyController::class, 'create'])->name('admin.faculty.create');
    Route::post('/admin/faculty', [FacultyController::class, 'store'])->name('admin.faculty.store');
    Route::get('/admin/faculty/{id}', [FacultyController::class, 'show'])->name('admin.faculty.show');
    Route::get('/admin/faculty/{id}/edit', [FacultyController::class, 'edit'])->name('admin.faculty.edit');
    Route::put('/admin/faculty/{id}', [FacultyController::class, 'update'])->name('admin.faculty.update');
    Route::delete('/admin/faculty/{id}', [FacultyController::class, 'destroy'])->name('admin.faculty.destroy');
});







Route::middleware(['auth','adminMiddleware'])->group(function(){

    Route::get('/admin/event', [EventController::class, 'index'])->name('admin.event.index');
    Route::get('/admin/event/create', [EventController::class, 'create'])->name('admin.event.create');
    Route::post('/admin/event', [EventController::class, 'store'])->name('event.store');
   
    Route::get('/admin/event/{event}/edit', [EventController::class, 'edit'])->name('admin.event.edit');
    
    // Route to update the existing event
    Route::put('/admin/event/{event}', [EventController::class, 'update'])->name('admin.event.update');
  
     Route::delete('/admin/event/{event}', [EventController::class, 'destroy'])->name('admin.event.destroy');

});





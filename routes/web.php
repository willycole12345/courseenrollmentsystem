<?php

use App\Livewire\CourseDetails;
use App\Livewire\CourseList;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('login');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
  
    Route::redirect('settings', 'settings/profile');
  
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/courses', CourseList::class)->name('courses.index');
    Route::post('/courses', CourseList::class)->name('courses.index');
    Route::get('/courses/{course}', CourseDetails::class)->name('courses.show')->middleware('can:view,course');

    
});  
require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PreauthController;
use App\Http\Controllers\MeetingController;

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

// Route::get('/agenda-detail', function () {
//     return List('meeting/agenda-detail');
//     })->name('agenda-detail');
// Route::get('/agenda-rapat', function () {
//     return List('meeting/agenda-rapat');
//     });
//     return List('dashboard');
// })->name('dashboard');
Auth::routes();
Route::middleware(['auth:sanctum'])->group(function () {
    
    //MEETING ROUTE
    Route::get('/', [App\Http\Controllers\MeetingController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [App\Http\Controllers\MeetingController::class, 'index'])->name('dashboard');
    Route::get('/management/meeting', [App\Http\Controllers\MeetingController::class, 'meetingList'])->name('meetingList');
    Route::get('/management/meeting/{id}/detail', [App\Http\Controllers\MeetingController::class, 'meetingDetail'])->name('meetingDetail');
    Route::get('/management/meeting/create', [App\Http\Controllers\MeetingController::class, 'meetingCreate'])->name('meetingCreate');
    Route::get('/management/meeting/{id}/update', [App\Http\Controllers\MeetingController::class, 'meetingUpdate'])->name('meetingUpdate');
    Route::get('/management/meeting/{id}/delete', [App\Http\Controllers\MeetingController::class, 'meetingDelete'])->name('meetingDelete');
    Route::post('/management/meeting/save', [App\Http\Controllers\MeetingController::class, 'meetingSave'])->name('meetingSave');
    
    //ATTENDENCE ROUTE
    Route::get('/meeting', [App\Http\Controllers\MeetingController::class, 'agendaList'])->name('agendaList');
    Route::get('/meeting/{id}/detail', [App\Http\Controllers\MeetingController::class, 'agendaDetail'])->name('agendaDetail');

    //ABSEN ROUET
    Route::get('/absen/create', [App\Http\Controllers\MeetingController::class, 'absenCreate'])->name('absenCreate');

    //PROFILE ROUTE
    Route::get('/profile/detail', [App\Http\Controllers\UserController::class, 'profileDetail'])->name('profileDetail');
    Route::get('/profile/update', [App\Http\Controllers\UserController::class, 'profileUpdate'])->name('profileUpdate');
    Route::post('/profile/save', [App\Http\Controllers\UserController::class, 'profileSave'])->name('profileSave');

    //USER ROUTE
    Route::get('/management/user', [App\Http\Controllers\UserController::class, 'userList'])->name('userList');
    Route::get('/manamegement/user/{id}/update', [App\Http\Controllers\UserController::class, 'userUpdate'])->name('userUpdate');
    Route::post('/management/user/save', [App\Http\Controllers\UserController::class, 'userSave'])->name('userSave');
});


// Route::get('/home', [App\Http\Controllers\MeetingController::class, 'index'])->name('home');
// Auth::routes();
    // Route::get('access', function () {
    //     if (auth()->user()->tokenCan('allow:update')){
    //         return 'boleh';
    //     } else {
    //         return 'tidak boleh';
    //     }
    // });
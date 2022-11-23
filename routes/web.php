<?php

use App\Http\Controllers\Admin\ApprovedMeetingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PendingMeetingController;
use App\Http\Controllers\Admin\RejectedMeetingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Guest\ScheduleMeetingController;
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

Route::view('/', 'welcome')->name('index');
Route::post('/', ScheduleMeetingController::class)->name('register');

Route::view('/login', 'login')->name('login');
Route::post('/login', LoginController::class)->name('auth');
Route::any('/logout', LogoutController::class)->name('logout');

Route::get('/dashboard', DashboardController::class)->name('dashboard');
Route::any('/meetings/pending', PendingMeetingController::class)->name('meetings.pending');
Route::any('/meetings/approved', ApprovedMeetingController::class)->name('meetings.approved');
Route::any('/meetings/rejected', RejectedMeetingController::class)->name('meetings.rejected');

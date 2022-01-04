<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\HomeController;
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

/**
 * Route general
 */
Route::get('dang-ky', [HomeController::class, 'signup'])->name('signup');
Route::get('dang-nhap', [HomeController::class, 'login'])->name('login');
Route::get('dang-xuat', [HomeController::class, 'logout'])->name('logout');
Route::get('doi-mat-khau', [HomeController::class, 'changePassword'])->name('change_password');
Route::get('quen-mat-khau', [HomeController::class, 'forgotPassword'])->name('forgot_assword');

/**
 * Route full page candidate
 */
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('cong-viec/{slug}', [HomeController::class, 'job'])->name('job');

Route::get('ung-vien/{id}', [HomeController::class, 'candidate'])->name('candidate');
Route::get('cong-ty/{id}', [HomeController::class, 'company'])->name('company');

Route::get('ung-tuyen', [HomeController::class, 'apply'])->name('apply');
Route::get('yeu-thich', [HomeController::class, 'jobSave'])->name('job_save');

/**
 * Route full page recruitment
 */
Route::prefix('nha-tuyen-dung')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('recruitment.index');
});
// check duplicate email-ctv
Route::post('check-email', [UserController::class, 'checkEmail'])->name('check.email');

//Detail recruitment

Route::post('show-recruitment', [\App\Http\Controllers\Admin\UserRecruitmentController::class, 'showRecruitment'])->name('show.recruitment');

/**
 * User recruitment
 */
Route::post('on-tick', [\App\Http\Controllers\Admin\UserRecruitmentController::class, 'onTick'])->name('on.tick');
Route::post('off-tick', [\App\Http\Controllers\Admin\UserRecruitmentController::class, 'offTick'])->name('off.tick');



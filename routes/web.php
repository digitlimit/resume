<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Common\DashboardController;
use App\Http\Controllers\Common\ImageController;
use App\Http\Controllers\Common\MessageController;
use App\Http\Controllers\Common\ProfileController;
use App\Http\Controllers\Guest\EmailController;
use App\Http\Controllers\Guest\LoginController;
use App\Http\Controllers\Guest\PasswordController;
use App\Http\Controllers\Guest\RegisterController;
use App\Http\Controllers\Guest\ResetPasswordController;
use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\Resume\ContactController;
use App\Http\Controllers\Resume\CoreValueController;
use App\Http\Controllers\Resume\EducationController;
use App\Http\Controllers\Resume\InfoController;
use App\Http\Controllers\Resume\InterestController;
use App\Http\Controllers\Resume\PortfolioController;
use App\Http\Controllers\Resume\SkillController;
use App\Http\Controllers\Resume\SocialController;
use App\Http\Controllers\Resume\SummaryController;
use App\Http\Controllers\Resume\WorkExperienceController;

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

Route::controller(LandingController::class)->name('landing.')->group(function ()
{
    Route::get('/', 'index')->name('index');
});

//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', fn() => Inertia::render('Dashboard'))->name('dashboard');
});

Route::name('guest.')->prefix('guest')->group( function()
{
    Route::controller(LoginController::class)->group(function () {
        Route::get('login', 'getLogin')->name('getLogin');
        Route::post('login', 'postLogin')->name('postLogin');
    });

    Route::controller(RegisterController::class)->group(function () {
        Route::get('register', 'getRegister')->name('getRegister');
        Route::post('register', 'postRegister')->name('postRegister');
    });

    Route::controller(PasswordController::class)->group(function () {
        Route::post('password/reset', 'sendResetLinkEmail')->name('sendResetLinkEmail');
        Route::get('password/reset/{token}/{email}', 'showResetForm')->name('showResetForm');
        Route::post('password/change', 'postChangePassword')->name('postChangePassword');
    });

    Route::controller(MessageController::class)->group(function () {
        Route::post('message', 'postMessage')->name('postMessage');
    });
});

Route::name('common.')->group(function()
{
    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('index');
    });

    Route::controller(MessageController::class)->name('message.')->prefix('message')->group(function () {
        Route::get('message', 'index')->name('index');
        Route::get('message/compose', 'getCompose')->name('getCompose');
        Route::post('message/compose', 'postCompose')->name('postCompose');
        Route::get('message/reply/{message}', 'getReply')->name('getReply');
        Route::post('message/reply/{message}', 'postReply')->name('postReply');
        Route::get('message/delete/{message}', 'destroy')->name('destroy');
        Route::get('message/message/{message}', 'getMessage')->name('getMessage');
    });

    Route::controller(ProfileController::class)->middleware(['auth'])->name('profile.')->prefix('profile')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::put('/', 'update')->name('update');
        Route::get('/edit', 'edit')->name('edit');
        Route::delete('/', 'destroy')->name('destroy');
        Route::get('/signout', 'signout')->name('signout');
    });
});

Route::name('resume.')->prefix('resume')->middleware(['auth', 'todo'])->group(function()
{
    Route::controller(SummaryController::class)->name('summary.')->prefix('summary')->group(function ()
    {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::put('/', 'update')->name('update');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit', 'edit')->name('edit');
    });

    Route::controller(WorkExperienceController::class)->name('work_experience.')->prefix('work_experience')->group(function ()
    {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::put('/update/{work_experience}', 'update')->name('update');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{work_experience}', 'edit')->name('edit');
        Route::get('/delete/{work_experience}', 'destroy')->name('destroy');
    });

    Route::controller(EducationController::class)->name('education.')->prefix('education')->group(function ()
    {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::put('/update/{education}', 'update')->name('update');
        Route::get('/edit/{education}', 'edit')->name('edit');
        Route::get('/delete/{education}', 'destroy')->name('destroy');
    });

    Route::controller(SkillController::class)->name('skill.')->prefix('skill')->group(function ()
    {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::put('/update/{skill}', 'update')->name('update');
        Route::get('/edit/{skill}', 'edit')->name('edit');
        Route::get('/delete/{skill}', 'destroy')->name('destroy');
    });

    Route::controller(CoreValueController::class)->name('core_value.')->prefix('core_value')->group(function ()
    {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::put('/update/{core_value}', 'update')->name('update');
        Route::get('/edit/{core_value}', 'edit')->name('edit');
        Route::get('/delete/{core_value}', 'destroy')->name('destroy');
    });

    Route::controller(SocialController::class)->name('social.')->prefix('social')->group(function ()
    {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::put('/update/{social}', 'update')->name('update');
        Route::get('/edit/{social}', 'edit')->name('edit');
        Route::get('/delete/{social}', 'destroy')->name('destroy');
    });

    Route::controller(PortfolioController::class)->name('portfolio.')->prefix('portfolio')->group(function ()
    {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::put('/update', 'update')->name('update');
        Route::get('/create', 'create')->name('create');
        Route::put('/update/{portfolio}', 'update')->name('update');
        Route::get('/edit/{portfolio}', 'edit')->name('edit');
        Route::get('/delete/{portfolio}', 'destroy')->name('destroy');
    });

    Route::controller(InterestController::class)->name('interest.')->prefix('interest')->group(function ()
    {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::put('/update/{interest}', 'update')->name('update');
        Route::get('/edit/{interest}', 'edit')->name('edit');
        Route::get('/delete/{interest}', 'destroy')->name('destroy');
    });

    Route::controller(ContactController::class)->name('contact.')->prefix('contact')->group(function ()
    {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::put('/update', 'update')->name('update');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit', 'edit')->name('edit');
    });
});

Route::controller(UserController::class)->name('user.')->prefix('user')->group(function ()
{
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::get('/create', 'create')->name('create');
    Route::put('/update/{user}', 'update')->name('update');
    Route::get('/edit/{user}', 'edit')->name('edit');
    Route::get('/delete/{user}', 'destroy')->name('destroy');
});

<?php

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

Route::group([], function()
{

//    Route::domain('{account}.emekambah.test')->group(function () {
//        Route::get('/', function ($account) {
//            dd($account);
//        });
//    });


//    Route::name('admin.')->prefix('admin')->middleware([])->namespace('Admin')->group(function()
//    {
//
//
//        Route::name('profiles.')->prefix('profiles')->middleware([])->group(function ()
//        {
//            Route::get('/', 'ProfileController@index')
//                ->name('index');
//
//            Route::get('/profile', 'ProfileController@profile')
//                ->name('profile');
//
//            Route::post('/profile', 'ProfileController@profileUpdate')
//                ->name('profile_update');
//
//            Route::post('/', 'ProfileController@store')
//                ->name('store');
//
//            Route::put('/', 'ProfileController@update')
//                ->name('update');
//
//            Route::delete('/', 'ProfileController@destroy')
//                ->name('destroy');
//        });
//

//
//        Route::name('images.')->prefix('images')->middleware([])->group(function ()
//        {
//            Route::get('/', 'ImageController@index')
//                ->name('index');
//
//            Route::post('/', 'ImageController@store')
//                ->name('store');
//
//            Route::put('/', 'ImageController@update')
//                ->name('update');
//
//            Route::delete('/', 'ImageController@destroy')
//                ->name('destroy');
//        });
//
//        Route::name('users.')->prefix('users')->middleware([])->group(function ()
//        {
//            Route::get('/', 'UserController@index')
//                ->name('index');
//
//            Route::post('/', 'UserController@store')
//                ->name('store');
//
//            Route::put('/', 'UserController@update')
//                ->name('update');
//
//            Route::delete('/', 'UserController@destroy')
//                ->name('destroy');
//        });
//
//        Route::name('settings.')->prefix('settings')->middleware([])->group(function ()
//        {
//            Route::get('/', 'SettingController@index')
//                ->name('index');
//
//            Route::post('/', 'SettingController@store')
//                ->name('store');
//
//            Route::put('/', 'SettingController@update')
//                ->name('update');
//
//            Route::delete('/', 'SettingController@destroy')
//                ->name('destroy');
//        });
//    });

    Route::name('guest.')->prefix('guest')->middleware([])->namespace('Guest')->group( function()
    {
        Route::get('login',    'LoginController@getLogin')
            ->name('getLogin');

        Route::post('login',   'LoginController@postLogin')
            ->name('postLogin');

        Route::get('register',   'RegisterController@getRegister')
            ->name('getRegister');

        Route::post('register',   'RegisterController@postRegister')
            ->name('postRegister');

        Route::post('password/reset',   'PasswordController@sendResetLinkEmail')
            ->name('sendResetLinkEmail');

        Route::get('password/reset/{token}/{email}',   'PasswordController@showResetForm')
            ->name('showResetForm');

        Route::post('password/change',   'PasswordController@postChangePassword')
            ->name('postChangePassword');
//
//        Route::get('verify/{code}/{email}',   'EmailController@verify')
//            ->name('email.verify');
//
//        Route::post('verification/resend',   'EmailController@resendVerificationLinkEmail')
//            ->name('email.resend');
    });

    Route::name('common.')->middleware([])->namespace('Common')->group(function()
    {
        Route::get('/', 'DashboardController@index')->name('index');

        Route::name('message.')->prefix('message')->middleware([])->group(function ()
        {
            Route::get('/', 'MessageController@index')
                ->name('index');

            Route::post('/', 'MessageController@store')
                ->name('store');

            Route::put('/', 'MessageController@update')
                ->name('update');

            Route::delete('/', 'MessageController@destroy')
                ->name('destroy');
        });

        Route::name('profile.')->prefix('profile')->middleware(['auth'])->group(function ()
        {
            Route::get('/', 'ProfileController@index')
                ->name('index');

            Route::post('/', 'ProfileController@store')
                ->name('store');

            Route::get('/create', 'ProfileController@create')
                ->name('create');

            Route::put('/', 'ProfileController@update')
                ->name('update');

            Route::get('/edit', 'ProfileController@edit')
                ->name('edit');

            Route::delete('/', 'ProfileController@destroy')
                ->name('destroy');
        });
    });

    Route::name('resume.')
        ->prefix('resume')
        ->middleware(['auth', 'todo'])
        ->namespace('Resume')
        ->group(function()
    {
        Route::name('summary.')->prefix('summary')->middleware([])->group(function ()
        {
            Route::get('/', 'SummaryController@index')
                ->name('index');

            Route::post('/', 'SummaryController@store')
                ->name('store');
        });

        Route::name('work_experience.')->prefix('work_experience')->middleware([])->group(function ()
        {
            Route::get('/', 'WorkExperienceController@index')
                ->name('index');

            Route::post('/', 'WorkExperienceController@store')
                ->name('store');
        });

        Route::name('education.')->prefix('education')->middleware([])->group(function ()
        {
            Route::get('/', 'EducationController@index')
                ->name('index');

            Route::post('/', 'EducationController@store')
                ->name('store');
        });

        Route::name('skill.')->prefix('skill')->middleware([])->group(function ()
        {
            Route::get('/', 'SkillController@index')
                ->name('index');

            Route::post('/', 'SkillController@store')
                ->name('store');
        });

        Route::name('core_value.')->prefix('core_value')->middleware([])->group(function ()
        {
            Route::get('/', 'CoreValueController@index')
                ->name('index');

            Route::post('/', 'CoreValueController@store')
                ->name('store');
        });

        Route::name('social.')->prefix('social')->middleware([])->group(function ()
        {
            Route::get('/', 'SocialController@index')
                ->name('index');

            Route::post('/', 'SocialController@store')
                ->name('store');
        });

        Route::name('portfolio.')->prefix('portfolio')->middleware([])->group(function ()
        {
            Route::get('/', 'PortfolioController@index')
                ->name('index');

            Route::post('/', 'PortfolioController@store')
                ->name('store');
        });

        Route::name('interest.')->prefix('interest')->middleware([])->group(function ()
        {
            Route::get('/', 'InterestController@index')
                ->name('index');

            Route::post('/', 'InterestController@store')
                ->name('store');
        });

        Route::name('contact.')->prefix('contact')->group(function ()
        {
            Route::get('/', 'ContactController@index')
                ->name('index');

            Route::post('/', 'ContactController@store')
                ->name('store');

            Route::put('/update', 'ContactController@update')
                ->name('update');

            Route::get('/create', 'ContactController@create')
                ->name('create');

            Route::get('/edit', 'ContactController@edit')
                ->name('edit');
        });
    });

    Route::name('user.')->prefix('user')->middleware([])->namespace('User')->group(function ()
    {
        Route::get('/', 'UserController@index')
            ->name('index');

        Route::post('/', 'UserController@store')
            ->name('store');

        Route::put('/', 'UserController@update')
            ->name('update');

        Route::delete('/', 'UserController@destroy')
            ->name('destroy');
    });


    Route::name('landing.')->namespace('Landing')->middleware([])->group(function ()
    {
        Route::get('/', 'LandingController@index')->name('index');
    });
});



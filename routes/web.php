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
    Route::name('admin.')->prefix('admin')->middleware([])->namespace('Admin')->group(function()
    {


        Route::name('profiles.')->prefix('profiles')->middleware([])->group(function ()
        {
            Route::get('/', 'ProfileController@index')
                ->name('index');

            Route::get('/profile', 'ProfileController@profile')
                ->name('profile');

            Route::post('/profile', 'ProfileController@profileUpdate')
                ->name('profile_update');

            Route::post('/', 'ProfileController@store')
                ->name('store');

            Route::put('/', 'ProfileController@update')
                ->name('update');

            Route::delete('/', 'ProfileController@destroy')
                ->name('destroy');
        });

        Route::name('messages.')->prefix('messages')->middleware([])->group(function ()
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

        Route::name('images.')->prefix('images')->middleware([])->group(function ()
        {
            Route::get('/', 'ImageController@index')
                ->name('index');

            Route::post('/', 'ImageController@store')
                ->name('store');

            Route::put('/', 'ImageController@update')
                ->name('update');

            Route::delete('/', 'ImageController@destroy')
                ->name('destroy');
        });

        Route::name('users.')->prefix('users')->middleware([])->group(function ()
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

        Route::name('settings.')->prefix('settings')->middleware([])->group(function ()
        {
            Route::get('/', 'SettingController@index')
                ->name('index');

            Route::post('/', 'SettingController@store')
                ->name('store');

            Route::put('/', 'SettingController@update')
                ->name('update');

            Route::delete('/', 'SettingController@destroy')
                ->name('destroy');
        });
    });


    Route::name('common.')->middleware([])->namespace('Common')->group(function()
    {
        Route::get('/', 'DashboardController@index')->name('index');
    });

    Route::name('resume.')->prefix('resume')->middleware([])->namespace('Resume')->group(function()
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

        Route::name('contact.')->prefix('contact')->middleware([])->group(function ()
        {
            Route::get('/', 'ContactController@index')
                ->name('index');

            Route::post('/', 'ContactController@store')
                ->name('store');
        });
    });

    Route::get('/', function () {
        return view('landing.index');
    });
});



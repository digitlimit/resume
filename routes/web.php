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
        Route::get('/', 'DashboardController@index')->name('index');

        Route::name('profiles.')->prefix('profiles')->middleware([])->group(function ()
        {
            Route::get('/', 'ProfileController@index')
                ->name('index');

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

        Route::name('resumes.')->prefix('resumes')->middleware([])->group(function ()
        {
            Route::name('summaries.')->prefix('summaries')->middleware([])->group(function ()
            {
                Route::get('/', 'Resume\SummaryController@index')
                    ->name('index');

                Route::post('/', 'Resume\SummaryController@store')
                    ->name('store');

                Route::put('/', 'Resume\SummaryController@update')
                    ->name('update');

                Route::delete('/', 'Resume\SummaryController@destroy')
                    ->name('destroy');
            });

            Route::name('portfolios.')->prefix('portfolios')->middleware([])->group(function ()
            {
                Route::get('/', 'Resume\PortfolioController@index')
                    ->name('index');

                Route::post('/', 'Resume\PortfolioController@store')
                    ->name('store');

                Route::put('/', 'Resume\PortfolioController@update')
                    ->name('update');

                Route::delete('/', 'Resume\PortfolioController@destroy')
                    ->name('destroy');
            });

            Route::name('skills.')->prefix('skills')->middleware([])->group(function ()
            {
                Route::get('/', 'Resume\SkillController@index')
                    ->name('index');

                Route::post('/', 'Resume\SkillController@store')
                    ->name('store');

                Route::put('/', 'Resume\SkillController@update')
                    ->name('update');

                Route::delete('/', 'Resume\SkillController@destroy')
                    ->name('destroy');
            });

            Route::name('work_experiences.')->prefix('work_experiences')->middleware([])->group(function ()
            {
                Route::get('/', 'Resume\WorkExperienceController@index')
                    ->name('index');

                Route::post('/', 'Resume\WorkExperienceController@store')
                    ->name('store');

                Route::put('/', 'Resume\WorkExperienceController@update')
                    ->name('update');

                Route::delete('/', 'Resume\WorkExperienceController@destroy')
                    ->name('destroy');
            });

            Route::name('socials.')->prefix('socials')->middleware([])->group(function ()
            {
                Route::get('/', 'Resume\SocialController@index')
                    ->name('index');

                Route::post('/', 'Resume\SocialController@store')
                    ->name('store');

                Route::put('/', 'Resume\SocialController@update')
                    ->name('update');

                Route::delete('/', 'Resume\SocialController@destroy')
                    ->name('destroy');
            });

            Route::name('interests.')->prefix('interests')->middleware([])->group(function ()
            {
                Route::get('/', 'Resume\InterestController@index')
                    ->name('index');

                Route::post('/', 'Resume\InterestController@store')
                    ->name('store');

                Route::put('/', 'Resume\InterestController@update')
                    ->name('update');

                Route::delete('/', 'Resume\InterestController@destroy')
                    ->name('destroy');
            });

            Route::name('educations.')->prefix('educations')->middleware([])->group(function ()
            {
                Route::get('/', 'Resume\EducationController@index')
                    ->name('index');

                Route::post('/', 'Resume\EducationController@store')
                    ->name('store');

                Route::put('/', 'Resume\EducationController@update')
                    ->name('update');

                Route::delete('/', 'Resume\EducationController@destroy')
                    ->name('destroy');
            });

            Route::name('contacts.')->prefix('contacts')->middleware([])->group(function ()
            {
                Route::get('/', 'Resume\ContactController@index')
                    ->name('index');

                Route::post('/', 'Resume\ContactController@store')
                    ->name('store');

                Route::put('/', 'Resume\ContactController@update')
                    ->name('update');

                Route::delete('/', 'Resume\ContactController@destroy')
                    ->name('destroy');
            });

            Route::name('core_values.')->prefix('core_values')->middleware([])->group(function ()
            {
                Route::get('/', 'Resume\CoreValueController@index')
                    ->name('index');

                Route::post('/', 'Resume\CoreValueController@store')
                    ->name('store');

                Route::put('/', 'Resume\CoreValueController@update')
                    ->name('update');

                Route::delete('/', 'Resume\CoreValueController@destroy')
                    ->name('destroy');
            });
        });
    });

    Route::get('/', function () {
        return view('landing.index');
    });
});



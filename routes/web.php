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
    Route::name('admin.')->prefix('admin')->middleware([])->group(function()
    {
        Route::name('profiles.')->prefix('profiles')->middleware([])->group(function ()
        {
            Route::get('/', 'Admin\ProfileController@index')
                ->name('index');

            Route::post('/', 'Admin\ProfileController@store')
                ->name('store');

            Route::put('/', 'Admin\ProfileController@update')
                ->name('update');

            Route::delete('/', 'Admin\ProfileController@destroy')
                ->name('destroy');
        });

        Route::name('messages.')->prefix('messages')->middleware([])->group(function ()
        {
            Route::get('/', 'Admin\MessageController@index')
                ->name('index');

            Route::post('/', 'Admin\MessageController@store')
                ->name('store');

            Route::put('/', 'Admin\MessageController@update')
                ->name('update');

            Route::delete('/', 'Admin\MessageController@destroy')
                ->name('destroy');
        });

        Route::name('images.')->prefix('images')->middleware([])->group(function ()
        {
            Route::get('/', 'Admin\ImageController@index')
                ->name('index');

            Route::post('/', 'Admin\ImageController@store')
                ->name('store');

            Route::put('/', 'Admin\ImageController@update')
                ->name('update');

            Route::delete('/', 'Admin\ImageController@destroy')
                ->name('destroy');
        });

        Route::name('users.')->prefix('users')->middleware([])->group(function ()
        {
            Route::get('/', 'Admin\UserController@index')
                ->name('index');

            Route::post('/', 'Admin\UserController@store')
                ->name('store');

            Route::put('/', 'Admin\UserController@update')
                ->name('update');

            Route::delete('/', 'Admin\UserController@destroy')
                ->name('destroy');
        });

        Route::name('settings.')->prefix('settings')->middleware([])->group(function ()
        {
            Route::get('/', 'Admin\SettingController@index')
                ->name('index');

            Route::post('/', 'Admin\SettingController@store')
                ->name('store');

            Route::put('/', 'Admin\SettingController@update')
                ->name('update');

            Route::delete('/', 'Admin\SettingController@destroy')
                ->name('destroy');
        });




        Route::name('resumes.')->prefix('resumes')->middleware([])->group(function ()
        {
            Route::name('summaries.')->prefix('summaries')->middleware([])->group(function ()
            {
                Route::get('/', 'Admin\Resume\SummaryController@index')
                    ->name('index');

                Route::post('/', 'Admin\Resume\SummaryController@store')
                    ->name('store');

                Route::put('/', 'Admin\Resume\SummaryController@update')
                    ->name('update');

                Route::delete('/', 'Admin\Resume\SummaryController@destroy')
                    ->name('destroy');
            });

            Route::name('portfolios.')->prefix('portfolios')->middleware([])->group(function ()
            {
                Route::get('/', 'Admin\Resume\PortfolioController@index')
                    ->name('index');

                Route::post('/', 'Admin\Resume\PortfolioController@store')
                    ->name('store');

                Route::put('/', 'Admin\Resume\PortfolioController@update')
                    ->name('update');

                Route::delete('/', 'Admin\Resume\PortfolioController@destroy')
                    ->name('destroy');
            });

            Route::name('skills.')->prefix('skills')->middleware([])->group(function ()
            {
                Route::get('/', 'Admin\Resume\SkillController@index')
                    ->name('index');

                Route::post('/', 'Admin\Resume\SkillController@store')
                    ->name('store');

                Route::put('/', 'Admin\Resume\SkillController@update')
                    ->name('update');

                Route::delete('/', 'Admin\Resume\SkillController@destroy')
                    ->name('destroy');
            });

            Route::name('work_experiences.')->prefix('work_experiences')->middleware([])->group(function ()
            {
                Route::get('/', 'Admin\Resume\WorkExperienceController@index')
                    ->name('index');

                Route::post('/', 'Admin\Resume\WorkExperienceController@store')
                    ->name('store');

                Route::put('/', 'Admin\Resume\WorkExperienceController@update')
                    ->name('update');

                Route::delete('/', 'Admin\Resume\WorkExperienceController@destroy')
                    ->name('destroy');
            });

            Route::name('socials.')->prefix('socials')->middleware([])->group(function ()
            {
                Route::get('/', 'Admin\Resume\SocialController@index')
                    ->name('index');

                Route::post('/', 'Admin\Resume\SocialController@store')
                    ->name('store');

                Route::put('/', 'Admin\Resume\SocialController@update')
                    ->name('update');

                Route::delete('/', 'Admin\Resume\SocialController@destroy')
                    ->name('destroy');
            });

            Route::name('interests.')->prefix('interests')->middleware([])->group(function ()
            {
                Route::get('/', 'Admin\Resume\InterestController@index')
                    ->name('index');

                Route::post('/', 'Admin\Resume\InterestController@store')
                    ->name('store');

                Route::put('/', 'Admin\Resume\InterestController@update')
                    ->name('update');

                Route::delete('/', 'Admin\Resume\InterestController@destroy')
                    ->name('destroy');
            });

            Route::name('educations.')->prefix('educations')->middleware([])->group(function ()
            {
                Route::get('/', 'Admin\Resume\EducationController@index')
                    ->name('index');

                Route::post('/', 'Admin\Resume\EducationController@store')
                    ->name('store');

                Route::put('/', 'Admin\Resume\EducationController@update')
                    ->name('update');

                Route::delete('/', 'Admin\Resume\EducationController@destroy')
                    ->name('destroy');
            });

            Route::name('contacts.')->prefix('contacts')->middleware([])->group(function ()
            {
                Route::get('/', 'Admin\Resume\ContactController@index')
                    ->name('index');

                Route::post('/', 'Admin\Resume\ContactController@store')
                    ->name('store');

                Route::put('/', 'Admin\Resume\ContactController@update')
                    ->name('update');

                Route::delete('/', 'Admin\Resume\ContactController@destroy')
                    ->name('destroy');
            });

            Route::name('core_values.')->prefix('core_values')->middleware([])->group(function ()
            {
                Route::get('/', 'Admin\Resume\CoreValueController@index')
                    ->name('index');

                Route::post('/', 'Admin\Resume\CoreValueController@store')
                    ->name('store');

                Route::put('/', 'Admin\Resume\CoreValueController@update')
                    ->name('update');

                Route::delete('/', 'Admin\Resume\CoreValueController@destroy')
                    ->name('destroy');
            });
        });
    });
});







Route::get('/', function () {
    return view('landing.index');
});


Route::get('/admin', function () {
    return view('admin.index');
});
<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/{id}',['uses' => 'HomeController@singleProject','as' => 'project.single']);

Route::prefix('manage')
    ->name('manage.')
    ->middleware(['auth'])
    ->group(function () {

        Route::get('/', 'Manage\ManageController@dashboard')->name('manage'); 
        Route::get('/dashboard','Manage\ManageController@dashboard')->name('dashboard');

        /* Profiles Route */
        Route::get('/user/profile', ['uses' => 'Manage\ProfileController@index','as'   => 'user.profile']);
        Route::post('/user/profile/update', ['uses' => 'Manage\ProfileController@update','as'   => 'user.profile.update']);

        /* Settings Route */

        /* Color Route */
        Route::get('/settings/color', ['uses' => 'Manage\ColorSettingController@index','as'   => 'settings.color.index']);
        Route::post('/settings/color/update', ['uses' => 'Manage\ColorSettingController@update','as'   => 'settings.color.update']);

        /* Media Route */
        Route::get('/settings/media', ['uses' => 'Manage\MediaSettingController@index','as'   => 'settings.media.index']);
        Route::post('/settings/media/update', ['uses' => 'Manage\MediaSettingController@update','as'   => 'settings.media.update']);

        /* Sections Route */
        Route::get('/settings/section', ['uses' => 'Manage\SectionSettingController@index','as'   => 'settings.section.index']);
        Route::put('/settings/section/update/{section}', ['uses' => 'Manage\SectionSettingController@update','as'   => 'settings.section.update']);
        Route::get('/settings/section/enable/{section}', 'Manage\SectionSettingController@enabled')->name('settings.section.enabled');
        Route::get('/settings/section/disable/{section}','Manage\SectionSettingController@disabled')->name('settings.section.disabled');

        /* Title Route */
        Route::get('/settings/title', ['uses' => 'Manage\TitleController@index','as'   => 'settings.title.index']);
        Route::post('/settings/title', ['uses' => 'Manage\TitleController@store','as'   => 'settings.title.store']);
        Route::put('/settings/title/update/{title}', ['uses' => 'Manage\TitleController@update','as'   => 'settings.title.update']);
        Route::delete('/settings/title/destroy/{title}', ['uses' => 'Manage\TitleController@destroy','as'   => 'settings.title.destroy']);
        Route::get('/settings/title/enable/{title}', 'Manage\TitleController@enabled')->name('settings.title.enabled');
        Route::get('/settings/title/disable/{title}','Manage\TitleController@disabled')->name('settings.title.disabled');

        /* Education Route */
        Route::resource('education', 'Manage\EducationController');

        /* Skill Route */
        Route::resource('skill', 'Manage\SkillController');

        /* Language Route */
        Route::resource('language', 'Manage\LanguageController');

        /* Certificate Route */
        Route::resource('certificate', 'Manage\CertificateController');

        /* Experience Route */
        Route::resource('experience', 'Manage\ExperienceController');

        /* Social Links Route */
        Route::resource('social', 'Manage\SocialLinkController');
        Route::get('/social/enable/{social}', 'Manage\SocialLinkController@enabled')->name('social.enabled');
        Route::get('/social/disable/{social}','Manage\SocialLinkController@disabled')->name('social.disabled');

        /* Workshop Category Route */
        Route::resource('wscategory', 'Manage\WSCategoryController');

        /* Workshop Project Route */
        Route::resource('wsproject', 'Manage\WSProjectController');

        /* Counter Route */
        Route::resource('counter', 'Manage\CounterController');

    });
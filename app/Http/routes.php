<?php

Route::post('sms', [
    'as'=>'sms.post',
    'uses'=>'SmsController@reciveSms'
]);

Route::group(['middleware' => ['web', 'guest']], function () {

    Route::get('/', function () {
        return view('frontend.welcome');
    });

    /*
     * Authentication routes
     */
    Route::get('auth/login', [
        'as' => 'auth.login',
        'uses' => 'Auth\AuthController@getLogin',
    ]);

    Route::post('auth/login', [
        'as' => 'auth.login',
        'uses' => 'Auth\AuthController@postLogin',
    ]);

    Route::get('auth/register', [
        'as' => 'auth.register',
        'uses' => 'Auth\AuthController@getRegister',
    ]);

    Route::post('auth/register', [
        'as' => 'auth.register',
        'uses' => 'Auth\AuthController@postRegister',
    ]);

});

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('logout', [
        'as' => 'auth.logout',
        'uses' => 'Auth\AuthController@getLogout',
    ]);

    /*
     * Profile routes
     */

    Route::get('profile/edit', [
        'as' => 'profile.edit',
        'uses' => 'ProfileController@getEdit'
    ]);

    Route::post('profile/edit', [
        'as' => 'profile.edit',
        'uses' => 'ProfileController@postEdit'
    ]);

    /*
     * Dashboard routes
     */

    Route::get('dashboard', [
        'as' => 'dashboard',
        'uses' => 'DashboardController@index'
    ]);

    /*
     * Donors routes
     */

    Route::get('donors', [
        'as' => 'donors',
        'uses' => 'DonorsController@index'
    ]);

    Route::get('donors/archived', [
        'as' => 'donors.archived',
        'uses' => 'DonorsController@archivedDonors'
    ]);

    Route::get('donor/{donorId}', [
        'as' => 'donor',
        'uses' => 'DonorsController@getSingle'
    ]);

    Route::post('donor/{id}/change-password', [
        'as' => 'donor.change-password',
        'uses' => 'DonorsController@changePassword'
    ]);

    Route::post('donor/{id}/role', [
        'as' => 'donor.change-role',
        'uses' => 'DonorsController@changeDonorRole'
    ]);

    Route::post('donor/{id}/delete', [
        'as' => 'donor.delete',
        'uses' => 'DonorsController@deleteUser'
    ]);

    Route::post('donor/{id}/archive', [
        'as' => 'donor.archive',
        'uses' => 'DonorsController@archiveDonor'
    ]);

    Route::get('donor/{id}/edit', [
        'as' => 'donor.edit',
        'uses' => 'DonorsController@getEditDonor',
    ]);

    Route::post('donor/{id}/edit', [
        'as' => 'donor.edit',
        'uses' => 'DonorsController@postEditDonor',
    ]);

    Route::get('donor/{id}', [
        'as' => 'donor.single',
        'uses' => 'DonorsController@getSingle'
    ]);

    Route::get('donors/add', [
        'as' => 'donor.add',
        'uses' => 'DonorsController@getAdd'
    ]);

    Route::post('donors/add', [
        'as' => 'donor.add',
        'uses' => 'DonorsController@postAdd'
    ]);

    /*
     * Actions routes
     */

    Route::get('actions', [
        'as' => 'actions',
        'uses' => 'ActionsController@index'
    ]);

    Route::get('actions/add', [
        'as' => 'actions.add',
        'uses' => 'ActionsController@getAdd'
    ]);

    Route::get('actions/{id}/edit', [
        'as' => 'action.edit',
        'uses' => 'ActionsController@getEdit'
    ]);

    Route::post('action/{id}/success', [
        'as' => 'action.success',
        'uses' => 'ActionsController@addToActionList'
    ]);

    Route::post('action/{actionId}/donor/{donorId}/remove', [
        'as' => 'action.donor.remove',
        'uses' => 'ActionsController@removeFromActionList'
    ]);

    Route::post('actions/add', [
        'as' => 'actions.add',
        'uses' => 'ActionsController@postAdd'
    ]);

    Route::post('action/{actionId}/question', [
        'as' => 'action.question',
        'uses' => 'ActionsController@askDonors'
    ]);

    Route::get('action/{actionId}', [
        'as' => 'action',
        'uses' => 'ActionsController@getSingle'
    ]);

    Route::post('action/{id}/delete', [
        'as' => 'action.delete',
        'uses' => 'ActionsController@deleteAction'
    ]);

    Route::post('action/{id}/solved', [
        'as' => 'action.status',
        'uses' => 'ActionsController@changeActionStatus'
    ]);

    Route::post('action/{actionId}/comming', [
        'as' => 'action.donor.comming',
        'uses' => 'ActionsController@donorCommingToAction'
    ]);

    /*
     * Locations routes
     */

    Route::get('locations', [
        'as' => 'locations',
        'uses' => 'LocationsController@index'
    ]);

    Route::post('location/add', [
        'as' => 'location.add',
        'uses' => 'LocationsController@postAdd'
    ]);

    Route::post('location/{id}/delete', [
        'as' => 'location.delete',
        'uses' => 'LocationsController@deleteLocation'
    ]);

    Route::post('location/{id}/edit', [
        'as' => 'location.edit',
        'uses' => 'LocationsController@postEditLocation',
    ]);


    /*
     * Blood types routes
     */

    Route::get('blood-types', [
        'as' => 'blood-types',
        'uses' => 'BloodTypesController@index'
    ]);

    Route::post('blood-types/add', [
        'as' => 'blood-types.add',
        'uses' => 'BloodTypesController@postAdd'
    ]);

    Route::post('blood-types/{id}/edit', [
        'as' => 'blood-types.edit',
        'uses' => 'BloodTypesController@postEdit'
    ]);

    Route::post('blood-types/{id}/delete', [
        'as' => 'blood-types.delete',
        'uses' => 'BloodTypesController@delete'
    ]);

    /*
     * Settings routes
     */

    Route::get('settings/general', [
        'as' => 'settings.general',
        'uses' => 'Settings\SettingsController@getSettingsGeneral'
    ]);

    Route::get('settings/roles', [
        'as' => 'settings.roles',
        'uses' => 'Settings\SettingsController@getSettingsRoles'
    ]);

    Route::get('settings/community', [
        'as' => 'settings.community',
        'uses' => 'Settings\SettingsController@getSettingsCommunity'
    ]);

    Route::post('settings', [
        'as' => 'settings',
        'uses' => 'Settings\SettingsController@postSettings'
    ]);

    /*
     * Roles routes
     */

    Route::post('role/{id}/delete', [
        'as' => 'role.delete',
        'uses' => 'Settings\RolesController@postDelete'
    ]);

    Route::post('role/{id}/edit', [
        'as' => 'role.edit',
        'uses' => 'Settings\RolesController@postEdit'
    ]);

    Route::get('role/{id}', [
        'as' => 'role',
        'uses' => 'Settings\RolesController@getSingleRole'
    ]);

    /*
     * Permission routes
     */

    Route::post('role/{id}/permissions', [
        'as' => 'role.permissions',
        'uses' => 'Settings\RolesController@updateRolePermissions'
    ]);

    Route::post('role/{roleId}/permission/{permissionId}/remove', [
        'as' => 'role.permission.remove',
        'uses' => 'Settings\RolesController@removeRolePermission'
    ]);

    /*
     * Language routes
     */
    Route::get('lang/{lang}', [
        'as' => 'lang',
        'uses' => 'LanguageController@swap'
    ]);

});

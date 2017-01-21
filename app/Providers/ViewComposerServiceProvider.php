<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //Roles
        view()->composer(['donors::index','donors::add','settings::general'], 'App\Services\Composers\ListsComposer@composerRolesLists');

        //Permissions
        view()->composer(['backend.settings.roles.single'], 'App\Services\Composers\ListsComposer@composePermissionsLists');

        //Donors
        view()->composer(['actions::single'], 'App\Services\Composers\ListsComposer@composerDonorsLists');

        //Locations
        view()->composer([
            'donors::_partials.addDonorModal',
            'donors::edit',
            'backend.donors.single',
            'donors::add',
            'backend.auth.register'
        ], 'App\Services\Composers\ListsComposer@composeLocationsLists');

        //Bloodtypes
        view()->composer([
            'donors::_partials.addDonorModal',
            'donors::edit',
            'backend.donors.single',
            'donors::add',
            'backend.auth.register'
        ], 'App\Services\Composers\ListsComposer@composeBloodTypesLists');

    }
}

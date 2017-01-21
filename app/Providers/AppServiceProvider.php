<?php namespace App\Providers;

use App\Database\Donor\Donor;
use App\Database\Donor\DonorObserver;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        setLocale(LC_TIME, config('app.locale'));
        Carbon::setLocale(config('app.locale'));

        Donor::observe(DonorObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerRuntimeProviders();
        $this->registerBladeNamespaces();
    }

    public function registerBladeNamespaces()
    {
        View::addNamespace('donors', base_path('resources/views/backend/donors'));
        View::addNamespace('dashboard', base_path('resources/views/backend/dashboard'));
        View::addNamespace('settings', base_path('resources/views/backend/settings'));
        View::addNamespace('locations', base_path('resources/views/backend/locations'));
        View::addNamespace('actions', base_path('resources/views/backend/actions'));
        View::addNamespace('bloodtypes', base_path('resources/views/backend/bloodtypes'));
        View::addNamespace('errors', base_path('resources/views/errors'));
    }

    public function registerRuntimeProviders()
    {
        $this->app->register('App\Providers\ViewComposerServiceProvider');

        //If application is in production, dont register Laravel Debugbar
        if (!$this->app->environment('production')) {
            $this->app->register('Barryvdh\Debugbar\ServiceProvider');
            $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
        }
    }
}

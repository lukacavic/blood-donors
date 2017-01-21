<?php

namespace App\Providers;

use App\Database\Models\Permission;
use App\Database\Models\User;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [

    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->before(function ($donor) {
            if ($donor->isSuperAdmin()) {
                return true;
            }
        });

        if (Schema::hasTable('permissions')) {
            foreach ($this->getPermissions() as $permission) {
                $gate->define($permission->permission_slug, function ($user) use ($permission) {
                    return $user->hasPermission($permission);
                });
            }
        }

    }

    protected function getPermissions()
    {
        return Permission::with('roles')->get();
    }
}

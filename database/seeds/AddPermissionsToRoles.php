<?php

use App\Database\Authorization\Permission;
use App\Database\Authorization\Role;
use Illuminate\Database\Seeder;

class AddPermissionsToRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::all();
        $role = Role::find(1);
        $role->permissions()->attach($permissions);
    }
}

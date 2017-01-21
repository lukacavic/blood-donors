<?php

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
        $permissions = \App\Database\Models\Permission::all();
        $role = \App\Database\Models\Role::find(1);
        $role->permissions()->attach($permissions);
    }
}

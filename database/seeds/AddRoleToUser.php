<?php

use Illuminate\Database\Seeder;

class AddRoleToUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $donor = \App\Database\Donor\Donor::find(1);
        $role = \App\Database\Authorization\Role::find(1);
        $donor->roles()->attach($role);
    }
}

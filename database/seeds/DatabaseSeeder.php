<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LOVTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(ActionsTableSeeder::class);
        $this->call(BloodTypesSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(DonorsTableSeeder::class);
        $this->call(AddPermissionsToRoles::class);
        $this->call(AddRoleToUser::class);
    }
}

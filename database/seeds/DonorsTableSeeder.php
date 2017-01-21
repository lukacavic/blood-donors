<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        
        DB::table('donors')->truncate();

        $user = new \App\Database\Models\Donor();
        $user->first_name = "Admin";
        $user->last_name = "Admin";
        $user->username = "admin";
        $user->administrator = 1;
        $user->location_id = \App\Database\Models\Location::first()->id;
        $user->bloodtype_id = \App\Database\Models\BloodType::first()->id;
        $user->email = "admin@admin.com";
        $user->password = 'admin';
        $user->sex = 1;
        $user->save();
    }
}

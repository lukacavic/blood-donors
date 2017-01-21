<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodTypesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        Eloquent::unguard();

        DB::table('blood_types')->truncate();

        $location = new \App\Database\Models\BloodType();
        $location->code = "0+";
        $location->name = "0+";
        $location->description = "Nula pozitivna";
        $location->save();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

}
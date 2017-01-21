<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        Eloquent::unguard();

        DB::table('locations')->truncate();

        $location = new \App\Database\Models\Location();
        $location->code = "ST";
        $location->name = "Starigrad Paklenica";
        $location->description = "Starigrad Paklenica";
        $location->save();

    }

}
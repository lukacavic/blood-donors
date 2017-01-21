<?php

use App\Database\LOV\LOV;
use Illuminate\Database\Seeder;

class LOVTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LOV::create([
            'code_lov' => 'BLOOD_TYPE',
            'name'  => '0+'
        ]);

        LOV::create([
            'code_lov'  => 'CONTACT_TYPE',
            'name'  =>  'Mobitel'
        ]);
    }
}

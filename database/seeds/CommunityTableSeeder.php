<?php

use App\Database\Community\Community;
use Illuminate\Database\Seeder;

class CommunityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Community::create([
            'name'  =>  'Starigrad',
        ]);

        Community::create([
           'name'   =>  'Pakoštane'
        ]);
    }
}

<?php

use App\Database\Action\Action;
use Illuminate\Database\Seeder;

class ActionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        Action::create([
            'name'  =>  'Akcija',
            'status'    => 1,
            'start_date' => \Carbon\Carbon::now()
        ]);
    }
}

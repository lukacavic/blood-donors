<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        DB::table('roles')->truncate();

        $data = array(
            array(
                'role_title'=>'Administrator',
                'role_slug'=>'administator',
                'editable'=>0
            ),
            array(
                'role_title'=>'Moderator',
                'role_slug'=>'moderator',
                'editable'=>0
            ),
            array(
                'role_title'=>'User',
                'role_slug'=>'user',
                'editable'=>0
            ),
        );

        \App\Database\Authorization\Role::insert($data);
    }
}

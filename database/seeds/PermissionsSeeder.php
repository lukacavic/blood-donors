<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        DB::table('permissions')->truncate();

        $data = array(
            array(
                'permission_title'=>'Add donor',
                'permission_slug'=>'add-donor',
            ),
            array(
                'permission_title'=>'Edit donor',
                'permission_slug'=>'edit-donor',
            ),
            array(
                'permission_title'=>'Delete donor',
                'permission_slug'=>'delete-donor',
            ),
            array(
                'permission_title'=>'Show donor',
                'permission_slug'=>'show-donor',
            ),
            array(
                'permission_title'=>'Archive donor',
                'permission_slug'=>'archive-donor',
            ),
            array(
                'permission_title'=>'Add action',
                'permission_slug'=>'add-action',
            ),
            array(
                'permission_title'=>'Edit action',
                'permission_slug'=>'edit-action',
            ),
            array(
                'permission_title'=>'Delete action',
                'permission_slug'=>'delete-action',
            ),
            array(
                'permission_title'=>'Modify action status',
                'permission_slug'=>'action-modify-status',
            ),
            array(
                'permission_title'=>'Send sms to donors',
                'permission_slug'=>'action-send-sms',
            ),
            array(
                'permission_title'=>'Show actions',
                'permission_slug'=>'show-actions',
            ),
            array(
                'permission_title'=>'Add location',
                'permission_slug'=>'add-location',
            ),
            array(
                'permission_title'=>'Edit location',
                'permission_slug'=>'edit-location',
            ),
            array(
                'permission_title'=>'Delete location',
                'permission_slug'=>'delete-location',
            ),
            array(
                'permission_title'=>'Show locations',
                'permission_slug'=>'show-locations',
            ),
            array(
                'permission_title'=>'Add bloodtype',
                'permission_slug'=>'add-bloodtype',
            ),
            array(
                'permission_title'=>'Edit',
                'permission_slug'=>'edit-bloodtype',
            ),
            array(
                'permission_title'=>'Delete bloodtype',
                'permission_slug'=>'delete-bloodtype',
            ),
            array(
                'permission_title'=>'Show bloodtypes',
                'permission_slug'=>'show-bloodtypes',
            ),
            array(
                'permission_title'=>'Show settings',
                'permission_slug'=>'show-settings',
            ),
            array(
                'permission_title'=>'Show donors',
                'permission_slug'=>'show-donors',
            ),
            array(
                'permission_title'=>'Edit donor role',
                'permission_slug'=>'donor-edit-role',
            ),
        );

        \App\Database\Authorization\Permission::insert($data);


    }
}

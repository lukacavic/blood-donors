<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionDonorGoingTable extends Migration
{
    public function up()
    {
        Schema::create('action_donor_going', function (Blueprint $table) {
            $table->integer('action_id');
            $table->integer('donor_id');
            $table->integer('going');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('action_donor_going');
    }
}

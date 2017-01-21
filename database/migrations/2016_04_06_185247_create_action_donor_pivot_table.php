<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionDonorPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_donor', function (Blueprint $table) {
            $table->integer('action_id')->unsigned()->index();
            $table->integer('donor_id')->unsigned()->index();
            $table->primary(['action_id', 'donor_id']);
            $table->smallInteger('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('action_donor');
    }
}

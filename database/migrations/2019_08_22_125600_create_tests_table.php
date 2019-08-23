<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            // $table->increments('id');
            $table->string('caserp_id',11);
            $table->primary('caserp_id',11);
            // $table->string('Email',320)->unique();
            // $table->integer('Roll_No',false,false);
            // $table->string('Branch',80);
            $table->string('first_name',30);
            $table->string('last_name',30);
            // $table->string('Middle_Name',30);
            // $table->decimal('SSC',6,3);
            // $table->date('DOB');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tests');
    }
}

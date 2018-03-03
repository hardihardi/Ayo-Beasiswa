<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilitatorScholarship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilitator_scholarship', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('facilitator_id')->unsigned();
            $table->integer('scholarship_id')->unsigned();
            $table->timestamps();

            $table->foreign('facilitator_id')->references('id')->on('facilitators')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('scholarship_id')->references('id')->on('scholarships')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

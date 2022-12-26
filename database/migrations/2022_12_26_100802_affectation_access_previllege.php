<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('affectation_access_previllege', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('affectation_access_id');
            $table->foreign('affectation_access_id')->references('id')->on('affectation_accesses')->onDelete('cascade');;
            $table->unsignedBigInteger('previllege_id');
            $table->foreign('previllege_id')->references('id')->on('previlleges')->onDelete('cascade');


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
        Schema::dropIfExists('affectation_access_previllege');

    }
};

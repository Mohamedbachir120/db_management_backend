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
        Schema::create('bdd_project', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bdd_id');
            $table->foreign('bdd_id')->references('id')->on('bdds')->onDelete('cascade');;
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');


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
        Schema::dropIfExists('bdd_project');

    }
};

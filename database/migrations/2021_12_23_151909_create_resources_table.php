<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('desciption');
            $table->string('url');
            $table->foreignId('localisation_id');
            $table->foreignId('responsable_id');
            $table->foreign('responsable_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('localisation_id')->references('id')->on('localisations')->onDelete('cascade');
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
        Schema::dropIfExists('resources');
    }
}

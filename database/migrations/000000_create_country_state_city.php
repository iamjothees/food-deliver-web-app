<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->index();
            $table->string('code');
            $table->string('name');
            $table->integer('phonecode');
        });

        Schema::create('states', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('name');
            $table->integer('country_id');            
        });

        Schema::create('cities', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->index();
            $table->string('name');
            $table->integer('state_id');            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
        Schema::dropIfExists('states');
        Schema::dropIfExists('countries');
    }
};

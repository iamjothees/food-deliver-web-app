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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('username')->unique();
            $table->string('password');
            $table->text('address_1')->nullable();
            $table->text('address_2')->nullable();
            $table->integer('pincode')->nullable();
            $table->foreignId('country_id');
            $table->foreignId('state_id')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->text('phone_with_cc');
            $table->text('whatsapp_with_cc')->nullable();
            $table->text('email')->unique()->nullable();
            $table->tinyInteger('status')->default(1);
            $table->foreignId('created_by_id')->constrained('staffs')->nullable();
            $table->foreignId('updated_by_id')->constrained('staffs')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};

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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->time('serving_time_start')->default(('08:00'));
            $table->time('serving_time_end')->default(('21:00'));
            $table->date('serving_date_start')->nullable();
            $table->date('serving_date_end')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->foreignId('created_by_id')->constrained('staffs');
            $table->foreignId('updated_by_id')->constrained('staffs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};

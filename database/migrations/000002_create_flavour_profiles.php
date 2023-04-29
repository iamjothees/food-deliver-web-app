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
        Schema::create('flavour_profiles', function (Blueprint $table) {
            $table->id();
            $table->float('sweet')->default(0);
            $table->float('salty')->default(0);
            $table->float('sour')->default(0);
            $table->float('bitter')->default(0);
            $table->float('umami')->default(0);
            $table->float('spicy')->default(0);
            $table->text('description')->nullable();
            /* $table->string('flavourable_type');
            $table->unsignedBigInteger('flavourable_id'); */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flavour_profiles');
    }
};

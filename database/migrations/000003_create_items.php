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
        Schema::create('item_units', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('code');
        });

        Schema::create('items', function (Blueprint $table) {
            //Status :-          0 - void,      1 - available,        2 - unavailable
            $table->id();
            $table->text('name');
            $table->text('description')->nullable();
            $table->foreignId('unit_id')->constrained('item_units')->nullable();
            $table->foreignId('flavour_profile_id')->constrained()->nullable();
            $table->decimal('price', 15, 2);
            $table->text('image_path')->nullable();
            $table->text('nutrition_info')->nullable();
            $table->boolean('status')->default(1);
            $table->foreignId('created_by_id')->constrained('staffs');
            $table->foreignId('updated_by_id')->constrained('staffs');
            $table->timestamps();
        });

        Schema::create('item_menu', function (Blueprint $table) {
            $table->primary(['item_id', 'menu_id']);
            $table->foreignId('item_id')->constrained();
            $table->foreignId('menu_id')->constrained()->onDelete('cascade');
        });
        
        Schema::create('category_item', function (Blueprint $table) {
            $table->primary(['category_id', 'item_id']);
            $table->foreignId('category_id')->constrained();
            $table->foreignId('item_id')->constrained()->onDelete('cascade');
        });

        Schema::create('item_ingredient', function (Blueprint $table) {
            $table->primary(['ingredient_id', 'item_id']);
            $table->foreignId('ingredient_id')->constrained();
            $table->foreignId('item_id')->constrained()->onDelete('cascade');

        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_ingredient');
        Schema::dropIfExists('category_item');
        Schema::dropIfExists('item_menu');
        Schema::dropIfExists('items');
        Schema::dropIfExists('item_units');
    }
};

/*
ID: A unique identifier for each menu item.
Name: The name of the menu item.
Description: A brief description of the menu item.
Category: The category to which the menu item belongs (e.g. appetizers, entrees, desserts).
Price: The price of the menu item.
Availability: Whether the menu item is currently available or not.
Image: An image of the menu item (optional).
Ingredients: A list of ingredients used in the menu item (optional).
Nutrition Information: Nutritional information of the menu item (optional)
 */

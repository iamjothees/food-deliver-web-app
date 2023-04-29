<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    
    function menus(){
        return $this->belongsToMany(Menu::class, 'item_menu', 'item_id');
    }

    function categories(){
        return $this->belongsToMany(Category::class, 'category_item', 'item_id');
    }

    function ingredients(){
        return $this->belongsToMany(Ingredient::class, 'ingredient_item', 'item_id');
    }

    function flavourProfile(){
        return $this->hasOne(FlavorProfile::class);
    }

    function unit(){
        return $this->belongsTo(ItemUnit::class);
    }

    function creator(){
        return $this->belongsTo(Staff::class, 'created_by_id');
    }

    function updator(){
        return $this->belongsTo(Staff::class, 'updated_by_id');
    }
    
}

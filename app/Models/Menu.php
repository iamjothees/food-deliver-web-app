<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    function items(){
        return $this->belongsToMany(Item::class, 'item_menu', 'menu_id');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    function list(){

    }

    function create(){

    }

    function store(Request $request){
        $validated = $request->validate([
            'name' => ['required'],
            'menu_id' => ['required'],
            'category_id' => ['required'],
            'price' => ['required'],
        ]);

        $item = new Item();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->menu_id = $request->menu_id;
        $item->category_id = $request->category_id;
        $item->price = $request->price;
        $item->images = $request->images;
        $item->nutrition_info = $request->nutrition_info;
        $item->status = $request->status;
        $item->created_by = Auth::user()->id;
        $item->save();


    }

    function edit(){

    }

    function update(Request $request){
        $validated = $request->validate([
            'name' => ['required'],
            'menu_id' => ['required'],
            'category_id' => ['required'],
            'price' => ['required'],
        ]);

        $item = new Item();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->menu_id = $request->menu_id;
        $item->category_id = $request->category_id;
        $item->price = $request->price;
        $item->images = $request->images;
        $item->nutrition_info = $request->nutrition_info;
        $item->status = $request->status;
        $item->updated_by = Auth::user()->id;
        $item->save();
    }

    function delete(){

    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ItemController extends Controller
{
    function index(Request $request){
        $items = Item::
                    with(['menus', 'categories'])
                    ->when($request->menu_filter, function($q, $query){
                        return $q->where('menu_id', $query);
                    })
                    ->when($request->category_filter, function($q, $query){
                        return $q->whereHas('categories', function($q) use ($query){
                            return $q->where('id', $query);
                        });
                    })
                    ->paginate(15);
        $menus = Menu::select('id', 'name')->get();
        $categories = Category::select('id', 'name')->get();

        return view('admin.items', ['items' => $items, 'menus' => $menus ,'categories' => $categories ]);
    }

    function store(Request $request){
        $attributes = $request->validate([
            'name' => 'required',
            'image' => 'file|mimes:jpg,png,jpeg'
        ]);

        $path = (request()->file('image')) ? request()->file('image')->store('item/images', 'public') : '';
        $item = new Item();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->image_path =   (request()->file('image')) ? URL::to('/') . '/storage/' . $path : null;
        $item->nutrition_info = $request->nutrition_info;
        $item->created_by_id = auth()->guard('staff')->user()->id;;
        $item->updated_by_id = auth()->guard('staff')->user()->id;;
        $item->save();
        
        $item->menus()->sync( explode(',', $request->menus_ids), false);
        if($request->categories_ids){
            $item->categories()->sync( explode(',', $request->categories_ids), false);
        }
        
        return redirect()->route('admin.items')->with('success', $item->name . ' added successfully');

    }

    function update(Request $request){
        $attributes = $request->validate([
            'name' => 'required',
            'image' => 'file|mimes:jpg,png,jpeg'
        ]);
        
        $path = (request()->file('image')) ? request()->file('image')->store('item/images', 'public') : '';
        $item = Item::find($request->id);
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->image_path =   (request()->file('image')) ? URL::to('/') . '/storage/' . $path : null;
        $item->nutrition_info = $request->nutrition_info;
        $item->created_by_id = auth()->guard('staff')->user()->id;;
        $item->updated_by_id = auth()->guard('staff')->user()->id;;
        $item->save();
        
        $item->menus()->sync( explode(',', $request->menus_ids), false);
        if($request->categories_ids){
            $item->categories()->sync( explode(',', $request->categories_ids), false);
        }

        return redirect()->route('admin.items')->with('success', $item->name . ' updated successfully');

    }

    function destroy(Item $item){
        $item->delete();

        return redirect()->route('admin.items')->with('success', $item->name . ' deleted successfully');
    }
}

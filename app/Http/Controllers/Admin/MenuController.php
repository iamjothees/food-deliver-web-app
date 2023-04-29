<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    function index(Request $request){
        $menus = Menu::
                    when($request->search_query, function($q, $query){
                        return $q->where('name', 'like', '%'. $query .'%');
                    })->
                    withCount(['items'=> function($query){
                        $query->where('status', '1');
                    }])->paginate(30);
        

        return view('admin.menus', [
            'menus' => $menus
        ]);
    }

    function store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        $menu = new Menu();
        $menu->name = $request->name;
        $menu->serving_time_start = $request->serving_time_start;
        $menu->serving_time_end = $request->serving_time_end;
        $menu->serving_date_start = $request->serving_date_start;
        $menu->serving_date_end = $request->serving_date_end;
        $menu->created_by_id = Auth::guard('staff')->user()->id;
        $menu->updated_by_id = Auth::guard('staff')->user()->id;
        $menu->save();

        return redirect()->route('admin.menus')->with('success', $menu->name . ' added successfully');

    }
    
    
    function update(Request $request){
        /* dd($request); */
        $request->validate([
            'name' => 'required',
        ]);

        $menu = Menu::find($request->id);
        $menu->name = $request->name;
        $menu->serving_time_start = $request->serving_time_start;
        $menu->serving_time_end = $request->serving_time_end;
        $menu->serving_date_start = $request->serving_date_start;
        $menu->serving_date_end = $request->serving_date_end;
        $menu->updated_by_id = Auth::guard('staff')->user()->id;
        $menu->save();

        return redirect()->route('admin.menus')->with('success', $menu->name . ' updated successfully');

    }


    function destroy(Menu $menu){
        $menu->delete();
        
        return redirect()->route('admin.menus')->with('success', $menu->name . ' deleted successfully');
    }

    function suggests(Request $request){
        $menus = Menu::select('id', 'name')->where('name', 'like', '%'. $request->input('query') . '%')->get();
        return json_encode($menus);
    }
}

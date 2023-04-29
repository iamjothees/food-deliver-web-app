<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index(){
        $categories = Category::
                        withCount(['items'=> function($query){
                            $query->where('status', '1');
                        }])->paginate(30);
        return view('admin.categories', [
            'categories' => $categories
        ]);
    }

    function store(Request $request){
        /* dd($request); */
        $request->validate([
            'name' => 'required',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->created_by_id = auth()->guard('staff')->user()->id;;
        $category->updated_by_id = auth()->guard('staff')->user()->id;;
        $category->save();

        return redirect()->route('admin.categories')->with('success', $category->name . ' added successfully');

    }
    
    
    function update(Request $request){
        /* dd($request); */
        $request->validate([
            'name' => 'required',
        ]);

        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->updated_by_id = auth()->guard('staff')->user()->id;;
        $category->save();

        return redirect()->route('admin.categories')->with('success', $category->name . ' updated successfully');

    }


    function destroy(Category $category){
        $category->delete();
        
        return redirect()->route('admin.categories')->with('success', $category->name . ' deleted successfully');
    }

    function suggests(Request $request){
        $categories = Category::select('id', 'name')->where('name', 'like', '%'. $request->input('query') . '%')->get();
        return json_encode($categories);
    }
}

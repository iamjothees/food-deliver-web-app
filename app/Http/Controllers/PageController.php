<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PageController extends Controller
{
    public function guestIndex(){
        return Inertia::render('guestIndex');
    }

    public function index(){
        $catchyFoodItems = Item::where('views', '1')->get();
        $foodItems = Item::with('menus', 'categories')->get();
        $menus = Menu::with('items')->get();
        $currentMenus = [];
        $now   = Carbon::now('Asia/Kolkata');
        $time  = $now->format('H:i:s');
        $startArr = [];
        $endArr = [];
        foreach ($menus as $menu){

            /* $now = Carbon::now();

            $start = Carbon::createFromTimeString($menu->serving_time_start);
            $end = Carbon::createFromTimeString($menu->serving_time_end);

            if (1){
                $end = $end->addDay();
            }

            if ($now->between($start, $end)) {
                $currentMenus[] = $menu;
            } */

            $start = $menu->serving_time_start;
            $end = $menu->serving_time_end;
            $startArr[] = $start;
            $endArr[] = $end;
            if ( $time >= $start && $time <= $end ){
                $currentMenus[] = $menu;
            }
            
        };
        //dd($time >= $startArr[5] && $time <= $endArr[5]);
                
        $currentItems = [];
        foreach($currentMenus as $currentMenu){
            foreach($currentMenu->items as $item){
                $currentItems[] = $item;
            }
        }
        $categories = Category::all();
        return Inertia::render('index', [
            'user' => auth()->user(),
            'heroData' => $catchyFoodItems,
            'foodItems' => $foodItems,
            'currentItems' => $currentItems,
            'categories' => $categories,
        ]);
    }


}

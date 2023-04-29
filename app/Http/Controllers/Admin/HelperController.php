<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class HelperController extends Controller
{
    function countriesSuggests(Request $request){
        $countries = Country::select('id', 'name', 'phonecode')->where('name', 'like', '%'. $request->input('query') . '%')->get();
        return json_encode($countries);
    }
    
    function statesSuggests(Request $request){
        $states = State::select('id', 'name')->where('country_id', $request->country_id)->where('name', 'like', '%'. $request->input('query') . '%')->get();
        return json_encode($states);
    }
    
    function citiesSuggests(Request $request){
        $cities = City::select('id', 'name')->where('state_id', $request->state_id)->where('name', 'like', '%'. $request->input('query') . '%')->get();
        return json_encode($cities);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function index(Request $request){
        $customers = Customer::
                    paginate(15);
        
        /* $menus = Menu::select('id', 'name')->get();
        $categories = Category::select('id', 'name')->get(); */

        return view('admin.customers', ['customers' => $customers]);
    }

    function store(Request $request){
        
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:customers',
            'password' => 'required',
            'email' => 'unique:customers',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required'
        ]); 
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->username = $request->username;
        $customer->password = password_hash($request->password, PASSWORD_DEFAULT);
        $customer->phone_with_cc = $request->phone;
        $customer->whatsapp_with_cc = $request->whatsapp;
        $customer->email = $request->email;
        $customer->country_id = $request->country_id;
        $customer->state_id = $request->state_id;
        $customer->city_id = $request->city_id;
        $customer->address_1 = $request->address_1;
        $customer->address_2 = $request->address_2;
        $customer->pincode = $request->pincode;
        $customer->created_by_id = auth()->guard('staff')->user()->id;;
        $customer->updated_by_id = auth()->guard('staff')->user()->id;;
        $customer->save();
        
        return redirect()->route('admin.customers')->with('success', $customer->name . ' added successfully');

    }

    function update(Request $request){
        $attributes = $request->validate([
            'reference' => 'required',
            'images' => 'file|mimes:jpg,png,jpeg'
        ]);
        
        $customer = Customer::find($request->id);
        $customer->reference = $request->reference;
        $customer->description = $request->description;
        $customer->seating_count = $request->seating_count;
        $customer->reputation = $request->reputation;
        $customer->created_by_id = auth()->guard('staff')->user()->id;;
        $customer->updated_by_id = auth()->guard('staff')->user()->id;;
        $customer->save();
        
        return redirect()->route('admin.customers')->with('success', $customer->reference . ' updated successfully');
    }

    function destroy(Customer $customer){
        $customer->delete();
        return redirect()->route('admin.customers')->with('success', $customer->reference . ' deleted successfully');
    }
}

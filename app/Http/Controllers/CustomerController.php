<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    protected function index()
    {
        $data = Customer::all();
        return view('admin.customer.index', compact('data'));
    }

    protected function store(Request $request) 
    {
        $response = $request->all();

        $data = [
            'name' => $response['name'],
            'image' => $response['image'],
            'type' => $response['type'],
            'about' => $response['about'],
        ];

        $destination_path = 'public/images'; 
        $image = $request -> file('image');
        $image_name = $image->getClientOriginalName(); 
        $path = $request->file('image')->storeAs($destination_path, $image_name); 
        $data['image'] = $image_name;

        Customer::create($data);
        return back();
    }

    protected function destroy($id) 
    {
        Customer::find($id)->delete();
        return back();
    }

    protected function edit($id) 
    {
        $data = Customer::find($id);
        return response()->json($data);
    }

    protected function update(Request $request, $id) 
    {
        $response = $request->all();

        if($request->image) {
            $data = [
                'name' => $response['name'],
                'image' => $response['image'],
                'type' => $response['type'],
                'about' => $response['about'],
            ];

            $destination_path = 'public/images'; 
            $image = $request -> file('image');
            $image_name = $image->getClientOriginalName(); 
            $path = $request->file('image')->storeAs($destination_path, $image_name); 
            $data['image'] = $image_name;
        } else {
            $data = [
                'name' => $response['name'],
                'type' => $response['type'],
                'about' => $response['about'],
            ];
        }

       

        Customer::find($id)->update($data);
        return redirect('/admin/customer');
    }
}

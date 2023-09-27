<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\CustomerConnector;
use App\PartnershipCategory;

class CustomerController extends Controller
{
    protected function index()
    {
        $data = Customer::all();
        $product = PartnershipCategory::all();
        return view('admin.customer.index', compact('data', 'product'));
    }

    protected function store(Request $request) 
    {
        $response = $request->all();

        $data = [
            'name' => $response['name'],
            'image' => $response['image'],
            'type' => $response['type'],
        ];

        $destination_path = 'public/images'; 
        $image = $request -> file('image');
        $image_name = $image->getClientOriginalName(); 
        $path = $request->file('image')->storeAs($destination_path, $image_name); 
        $data['image'] = $image_name;

        $customer = Customer::create($data);

        $customer_id = $customer->id;

        foreach ($response['id_product'] as $item => $value) {
            $data_connector = array(
                'id_product' => $response['id_product'][$item],
                'id_customer' => $customer_id,
            );
            CustomerConnector::create($data_connector);
        };
        return back();
    }

    protected function destroy($id) 
    {
        Customer::find($id)->delete();
        return back();
    }

    protected function edit($id) 
    {
        $data_customer = Customer::find($id);
        $data_connector = CustomerConnector::where('id_customer' ,$id)->get()->all();

        $response = [
            'data_customer' => $data_customer,
            'data_connector' => $data_connector
        ];
    
        return response()->json($response);
    }

    protected function update(Request $request, $id) 
    {
        $response = $request->all();

        if($request->image) {
            $data = [
                'name' => $response['name'],
                'image' => $response['image'],
                'type' => $response['type'],
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
            ];
        }

        CustomerConnector::where('id_customer', $id)->delete();

        foreach ($response['id_product'] as $item => $value) {
            $data_connector = array(
                'id_product' => $response['id_product'][$item],
                'id_customer' => $id,
            );
            CustomerConnector::create($data_connector);
        };
       

        Customer::find($id)->update($data);
        return redirect('/admin/customer');
    }
}

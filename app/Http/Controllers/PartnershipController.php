<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partnership;
use App\PartnershipCategory;
use App\PartnerConnector;

class PartnershipController extends Controller
{
    protected function index()
    {
        $data = Partnership::all();
        $category = PartnershipCategory::all();
        return view('admin.partnership.index', compact('data', 'category'));
    }

    protected function store(Request $request) 
    {
        $response = $request->all();

        $data_partner = [
            'name' => $response['name'],
            'image' => $response['image'],
            'level' => $response['level'],
        ];

        $destination_path = 'public/images'; 
        $image = $request -> file('image');
        $image_name = $image->getClientOriginalName(); 
        $path = $request->file('image')->storeAs($destination_path, $image_name); 
        $data_partner['image'] = $image_name;

        $partner = Partnership::create($data_partner);
        $partner_id = $partner->id;

        foreach ($response['id_product'] as $item => $value) {
            $data_connector = array(
                'id_product' => $response['id_product'][$item],
                'id_partnership' => $partner_id,
            );
            PartnerConnector::create($data_connector);
        };


        return back();
    }

    protected function update(Request $request, $id) 
    {
        $response = $request->all();

        if($request->image) {
            $data = [
                'name' => $response['name'],
                'image' => $response['image'],
                'level' => $response['level'],
            ];
                
            $destination_path = 'public/images'; 
            $image = $request -> file('image');
            $image_name = $image->getClientOriginalName(); 
            $path = $request->file('image')->storeAs($destination_path, $image_name); 
            $data['image'] = $image_name;
        } else {
            $data = [
                'name' => $response['name'],
                'level' => $response['level'],
            ];
        };

        PartnerConnector::where('id_partnership', $id)->delete();

        foreach ($response['id_product'] as $item => $value) {
            $data_connector = array(
                'id_product' => $response['id_product'][$item],
                'id_partnership' => $id,
            );
            PartnerConnector::create($data_connector);
        };

        Partnership::find($id)->update($data);
        return back();
    }

    public function edit($id) 
    {
        $data_partner = partnership::find($id);
        $data_connector = partnerConnector::where('id_partnership' ,$id)->get()->all();

        $response = [
            'data_partner' => $data_partner,
            'data_connector' => $data_connector
        ];
    
        return response()->json($response);
    }

    protected function destroy($id) 
    {
        Partnership::find($id)->delete();
        return back();
    }
}

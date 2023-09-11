<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partnership;
use App\PartnershipCategory;

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

        $data = [
            'name' => $response['name'],
            'image' => $response['image'],
            'id_category' => $response['id_category'],
            'level' => $response['level'],
        ];

        $destination_path = 'public/images'; 
        $image = $request -> file('image');
        $image_name = $image->getClientOriginalName(); 
        $path = $request->file('image')->storeAs($destination_path, $image_name); 
        $data['image'] = $image_name;

        Partnership::create($data);
        return back();
    }

    protected function update(Request $request) 
    {
        $response = $request->all();

        if($request->image) {
            $data = [
                'name' => $response['name'],
                'image' => $response['image'],
                'id_category' => $response['id_category'],
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
                'id_category' => $response['id_category'],
                'level' => $response['level'],
            ];
        };

        Partnership::find($id)->update($data);
        return back();
    }

    public function edit($id) {
        $data = partnership::find($id);
        return response()->json($data);
    }

    protected function destroy($id) 
    {
        Partnership::find($id)->delete();
        return back();
    }
}

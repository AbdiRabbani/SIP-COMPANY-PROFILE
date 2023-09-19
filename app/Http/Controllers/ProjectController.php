<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectReference;
use App\PartnershipCategory;

class ProjectController extends Controller
{
    public function index()
    {
        $data = ProjectReference::all();
        return view('admin.project.index', compact('data'));
    }

    public function create()
    {
        $product = PartnershipCategory::all();
        return view('admin.project.create', compact('product'));
    }

    public function store(Request $request)
    {
        $response = $request->all();

        $data = [
            'name' => $response['name'],
            'desc' => $response['desc'],
            'image' => $response['image'],
            'id_product' => $response['id_product'],
            'type' => $response['type'],
        ];
        
        $destination_path = 'public/images'; 
        $image = $request -> file('image');
        $image_name = $image->getClientOriginalName(); 
        $path = $request->file('image')->storeAs($destination_path, $image_name); 
        $data['image'] = $image_name;
        
        
        ProjectReference::create($data);
        return redirect('/admin/project-reference');
    }

    public function update(Request $request, $id)
    {
        $response = $request->all();

        $data = [
            'name' => $response['name'],
            'desc' => $response['desc'],
            'id_product' => $response['id_product'],
            'type' => $response['type'],
        ];

        if($request->hasFile('image')){
            $destination_path = 'public/images'; 
            $image = $request -> file('image');
            $image_name = $image->getClientOriginalName(); 
            $path = $request->file('image')->storeAs($destination_path, $image_name); 
            $data['image'] = $image_name;
        }

        ProjectReference::find($id)->update($data);
        return redirect('/admin/project-reference');
    }

    public function edit($id)
    {
        $data = ProjectReference::find($id);
        $product = PartnershipCategory::all();
        return view('admin.project.edit', compact('data', 'product'));
    }

    public function destroy($id)
    {
        ProjectReference::find($id)->delete();
        return back();
    }
}

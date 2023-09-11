<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectReference;

class ProjectController extends Controller
{
    public function index() {
        return view('admin.project.index');
    }

    public function create($id) {
        $fsi = ProjectReference::where('type', 1)->where('about', $id)->get()->first();
        $government = ProjectReference::where('type', 2)->where('about', $id)->get()->first();
        $manufacturing = ProjectReference::where('type', 3)->where('about', $id)->get()->first();
        $telco = ProjectReference::where('type', 4)->where('about', $id)->get()->first();
        $retail = ProjectReference::where('type', 5)->where('about', $id)->get()->first();
        $education = ProjectReference::where('type', 6)->where('about', $id)->get()->first();

        $id_ = $id;

        return view('admin.project.create', compact('fsi', 'government', 'manufacturing', 'telco', 'retail', 'education', 'id_'));
    }

    public function store(Request $request) {
        $response = $request->all();

        $data = [
            'name' => $response['name'],
            'desc' => $response['desc'],
            'image' => $response['image'],
            'about' => $response['about'],
            'type' => $response['type'],
        ];
        
        $destination_path = 'public/images'; 
        $image = $request -> file('image');
        $image_name = $image->getClientOriginalName(); 
        $path = $request->file('image')->storeAs($destination_path, $image_name); 
        $data['image'] = $image_name;
        
        
        ProjectReference::create($data);
        return back();
    }

    public function update(Request $request, $id) {
        $response = $request->all();

        $data = [
            'name' => $response['name'],
            'desc' => $response['desc'],
            'about' => $response['about'],
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
        return back();
    }

    public function edit($id) {
        $data = ProjectReference::where('id_category', $id)->get()->first();
        $id_ = $id;
        return view('admin.project.edit', compact('data', 'id_'));
    }
}

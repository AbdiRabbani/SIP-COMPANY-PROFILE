<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campaign;

class CampaignController extends Controller
{
    public function index()
    {
        $data = Campaign::all();
        return view('admin.campaign.index', compact('data'));
    }

    public function create()
    {
        return view('admin.campaign.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();;

        $data_all = [
            'title' => $data['title'],
            'image' => $data['image'],
            'paragraph' => $data['paragraph'],
        ];

            $destination_path = 'public/images'; 
            $image = $request -> file('image');
            $image_name = $image->getClientOriginalName(); 
            $path = $request->file('image')->storeAs($destination_path, $image_name); 
            $data_all['image'] = $image_name;



        Campaign::create($data_all);
        return redirect('admin/campaign');
    }

    public function edit($id)
    {
        $data = Campaign::find($id);
        return view('admin.campaign.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();;

        if($request->image){
            $data_all = [
                'title' => $data['title'],
                'image' => $data['image'],
                'paragraph' => $data['paragraph'],
            ];

                $destination_path = 'public/images'; 
                $image = $request -> file('image');
                $image_name = $image->getClientOriginalName(); 
                $path = $request->file('image')->storeAs($destination_path, $image_name); 
                $data_all['image'] = $image_name;
        } else {
            $data_all = [
                'title' => $data['title'],
                'paragraph' => $data['paragraph'],
            ];
        }



        Campaign::find($id)->update($data_all);
        return redirect('admin/campaign');
    }

    public function destroy(Request $request, $id)
    {
        Campaign::find($id)->delete($request->all());
        return back();
    }
}

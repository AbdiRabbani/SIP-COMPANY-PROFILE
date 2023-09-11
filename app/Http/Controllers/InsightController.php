<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Insights;
use App\About;
USE App\NewsTag;
USE App\TagConnector;

class InsightController extends Controller
{
    public function index()
    {
        $insights = Insights::all();
        return view('admin.insight.index', compact('insights'));
    }

    public function create()
    {
        $tag = NewsTag::all();
        return view('admin.insight.create', compact('tag'));
    }

    public function edit($id)
    {
        $data = Insights::find($id);
        $about = About::where('id_insights', $id)->get()->all();
        $tag = NewsTag::all();
        $connector = TagConnector::where('id_insights', $id)->get()->all();
        return view('admin.insight.edit', compact('data', 'about', 'tag', 'connector'));
    }

    public function store(Request $request)
    {
        $data = $request->all();;
            $data_all = [
                'title' => $data['title'],
                'image' => $data['image'],
                'type' => $data['type'],
                'paragraph' => $data['paragraph'],
            ];

            $destination_path = 'public/images'; 
            $image = $request -> file('image');
            $image_name = $image->getClientOriginalName(); 
            $path = $request->file('image')->storeAs($destination_path, $image_name); 
            $data_all['image'] = $image_name;

        $insights = Insights::create($data_all);

        if($data['type'] == 'blog') {
            foreach ($data['about'] as $item => $value) {
                $data_about = array(
                    'about' => $data['about'][$item],
                    'id_insights' => $insights->id,
                );
                About::create($data_about);
            };
        } else if($data['type'] == 'news') {
            foreach ($data['tag_name'] as $item => $value) {
                $data_tag = array(
                    'tag_name' => $data['tag_name'][$item],
                );
                $tag_insert = NewsTag::firstOrCreate($data_tag);

                $connector = array(
                    'id_tag' => $tag_insert->id,
                    'id_insights' => $insights->id,
                );

                TagConnector::create($connector);
            };
        }

        return redirect('admin/insights');
    }

    public function ckstore(Request $request)
    {

            $destination_path = 'public/images'; 
            $image = $request -> file('upload');
            $fileName = $image->getClientOriginalName(); 
            $path = $request->file('upload')->storeAs($destination_path, $fileName); 
            $data_all['upload'] = $fileName;

            $url = asset('storage/images/'. $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();;

        if($request->image){
            $data_all = [
                'title' => $data['title'],
                'image' => $data['image'],
                'type' => $data['type'],
                'paragraph' => $data['paragraph'],
            ];
            
            $destination_path = 'public/images'; 
            $image = $request -> file('image');
            $image_name = $image->getClientOriginalName(); 
            $path = $request->file('image')->storeAs($destination_path, $image_name); 
            $data_all['image'] = $image_name;
            
        }else {
            $data_all = [
                'title' => $data['title'],
                'type' => $data['type'],
                'paragraph' => $data['paragraph'],
            ];
        }

        
        if($request->type == 'blog'){
            About::where('id_insights', $id)->delete();
            foreach ($data['about'] as $item => $value) {
                $data_about = array(
                    'about' => $data['about'][$item],
                    'id_insights' => $id,
                );
                About::create($data_about);
            };
        }else if($request->type == 'news') {
            About::where('id_insights', $id)->delete();
            TagConnector::where('id_insights', $id)->delete();
            
            foreach ($data['tag_name'] as $item => $value) {
                $data_tag = array(
                    'tag_name' => $data['tag_name'][$item],
                );
                $tag_insert = NewsTag::firstOrCreate($data_tag);
                $connector = array(
                    'id_tag' => $tag_insert->id,
                    'id_insights' => $id,
                );
                TagConnector::where('id_insights', $id)->create($connector);
            };           
           
        }

            Insights::find($id)->update($data_all);
            return redirect('admin/insights');
    }

    public function destroy($id)
    {
        Insights::find($id)->delete();
        return back();
    }
}

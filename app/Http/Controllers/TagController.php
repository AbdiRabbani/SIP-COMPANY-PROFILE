<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsTag;

class TagController extends Controller
{
    public function index()
    {
        $data = NewsTag::all();
        return view('admin.insight.tag', compact('data'));
    }

    public function edit($id)
    {
        $data = NewsTag::find($id);
        return response()->json($data);
    }

    public function update(request $request, $id)
    {
        NewsTag::find($id)->update($request->all());
        return back();
    }

    public function destroy($id)
    {
        NewsTag::find($id)->delete();
        return back();
    }
}

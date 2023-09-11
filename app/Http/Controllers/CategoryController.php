<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PartnershipCategory;

class CategoryController extends Controller
{
    public function index() 
    {
        $partnership = PartnershipCategory::all();

        return view('admin.category.index', compact('partnership'));
    }

    public function editP($id)
    {
        $data = PartnershipCategory::find($id);
        return response()->json($data);
    }

    public function updateP(Request $request, $id)
    {
        PartnershipCategory::find($id)->update($request->all());
        return back();
    }

    public function store(Request $request)
    {
        PartnershipCategory::create($request->all());

        return redirect('admin/category');
    }

    public function destroyP($id) 
    {
        PartnershipCategory::find($id)->delete();
        return back();
    }
}

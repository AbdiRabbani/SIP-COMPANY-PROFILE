<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PartnershipCategory;
use App\SolutionPartner;

class SolutionController extends Controller
{
    public function index() 
    {
        $partner_section = PartnershipCategory::all();
        $one = SolutionPartner::where('id_solution', 1)->first();
        $two = SolutionPartner::where('id_solution', 2)->first();
        $three = SolutionPartner::where('id_solution', 3)->first();
        $four = SolutionPartner::where('id_solution', 4)->first();
        $five = SolutionPartner::where('id_solution', 5)->first();
        $six = SolutionPartner::where('id_solution', 6)->first();
        $seven = SolutionPartner::where('id_solution', 7)->first();
        $eight = SolutionPartner::where('id_solution', 8)->first();
        return view('admin.solution.index', compact('partner_section', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight'));
    } 

    public function store(Request $request)
    {
        SolutionPartner::create($request->all());
        return redirect('admin/solution');
    }

    public function update(Request $request, $id)
    {
        SolutionPartner::where('id_solution', $id)->update($request->except(['_token', '_method']));
        return redirect('admin/solution');
    }
}

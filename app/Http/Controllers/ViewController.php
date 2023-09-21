<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Insights;
use App\Campaign;
use App\Career;
use App\Customer;
use App\Partnership;
use App\ProjectReference;
use App\PartnershipCategory;
use App\SolutionPartner;
use App\About;
use App\NewsTag;
use App\BlogTag;
use App\TagConnector;
use App\JobRegist;

class ViewController extends Controller
{
    public function home() 
    {
        $new_data = Insights::where('type', 'News')->latest()->take(4)->get();
        $last_data = Insights::where('type', 'News')->latest()->get()->first();
        return view('main.home', compact('new_data', 'last_data'));
    }

    public function profile() 
    {
        return view('main.profile');
    }

    public function insight_n(Request $request) 
    {
        $value = $request->p;

        if($request->p) 
        {
            $data = Insights::where('type', 'news')->where('title', 'LIKE', '%' . $request->p . '%')->get()->all();
        } else {
            $data = Insights::where('type', 'news')->get()->all();
        }


        $tag = NewsTag::latest()->take(5)->get();
        $all_tag = NewsTag::inRandomOrder()->get()->all();
        return view('main.insights.news', compact('data', 'value', 'tag', 'all_tag'));
    }

    public function insight_b(Request $request) 
    {
        $value = $request->p;

        if($request->p) {
            $data = Insights::where('type', 'blog')->where('title', 'LIKE', '%' . $request->p . '%')->get()->all();
        } else {
            $data = Insights::where('type', 'blog')->get()->all();
        }

        $category1 = PartnershipCategory::where('about', '1')->get()->all();
        $category2 = PartnershipCategory::where('about', '2')->get()->all();
        $category3 = PartnershipCategory::where('about', '3')->get()->all();
        $category4 = PartnershipCategory::where('about', '4')->get()->all();

        return view('main.insights.blog', compact('data', 'value', 'category1', 'category2', 'category3', 'category4'));
    }

    public function insight_b_allData() 
    {
        $data = Insights::where('type', 'blog')->get()->all();
        return response()->json($data);
    }

    public function insight_b_data($id) 
    {
        $data = BlogTag::where('id_product', $id)->join('insights','insights.id', '=', 'blog_tag.id_insights')->get()->all();    
        return response()->json($data);
    }

    public function insight_b_search($name) 
    {
        $data = Insights::where('type', 'blog')->where('title', 'LIKE', '%' . $name . '%')->get()->all();
        return response()->json($data);
    }

    public function insight_n_allData() 
    {
        $data = Insights::where('type', 'news')->get()->all();
        return response()->json($data);
    }

    public function insight_n_search($name) 
    {
        $data = Insights::where('type', 'news')->where('title', 'LIKE', '%' . $name . '%')->get()->all();
        return response()->json($data);
    }

    public function insight_n_tag($id) 
    {
        $data = TagConnector::where('id_tag', $id)->join('insights','insights.id', '=', 'news_tag_connector.id_insights')->get()->all();    
        return response()->json($data);
    }

    public function insight_show($id) 
    {
        $data = Insights::find($id);
        $tag = TagConnector::where('id_insights', $data->id)->get()->all();
        $blogtag = BlogTag::where('id_insights', $data->id)->get()->all();
        $data_random_1 = Insights::where('type', 'Blog')->inRandomOrder()->take(4)->get();
        $data_random_2 = Insights::where('type', 'News')->inRandomOrder()->take(4)->get();
        return view('main.insights.detail', compact('data', 'data_random_1', 'data_random_2', 'blogtag', 'tag'));
    }
    
    public function solution() 
    {
        return view('main.solution.solution');
    }

    public function solution_show(Request $request) 
    {
        if($request->t == 1) {
            $title = "Enterprise Network Infrastructure";
            $image = 'custom/icon/network.png';
            $desc = "An infrastructure solution consists of project that utilize network devices such as switches, routers, and wireless routers";
        } elseif($request->t == 2) {
            $title = "Data center & Cloud";
            $image = 'custom/icon/cloudservice.png';
            $desc = "Solution based on SIP’s cloud partner products, such as Zettagrid Cloud, Amazon Web Services Cloud, Alibaba Cloud and Huawei Cloud";
        }elseif($request->t == 3) {
            $title = "Cyber Security";
            $image = 'custom/icon/security.png';
            $desc = "The concept of security solutions includes several technologies such as Network Firewalls, Web Application Firewalls, Email Security, End Point Protection, Secure Web Gateway, Security Information and Event Management (SIEM), and Security Orchestration Automation and Response (SOAR)";
        }elseif($request->t == 4) {
            $title = "Collaboration & Facility";
            $image = 'custom/icon/supportservice.png';
            $desc = "Collaboration solutions involve several technologies, such as IP phone, Contact Center, and Teleconference solutions";
        }

        $product= PartnershipCategory::where('about', $request->t)->get()->all();
        $blog = BlogTag::whereHas('product', function ($query) use ($request) {
            $query->where('about', $request->t);
        })->get()->all();    
        return view('main.solution.detail', compact('title', 'desc', 'image', 'product', 'blog'));
    }

    public function blogData($id) 
    {
        $data = BlogTag::where('id_product', $id)->join('insights','insights.id', '=', 'blog_tag.id_insights')->get()->all();    
        return response()->json($data);
    }

    public function campaign() 
    {
        $data = Campaign::all();
        $new_data = Campaign::latest()->take(4)->get();
        return view('main.campaign.campaign', compact('data', 'new_data'));
    }

    public function campaign_show($id) 
    {
        $data = Campaign::find($id);
        $data_random = Campaign::inRandomOrder()->take(4)->get();
        return view('main.campaign.detail', compact('data', 'data_random'));
    }

    public function partnership() 
    {
        $category1 = PartnershipCategory::where('about', '1')->get()->all();
        $category2 = PartnershipCategory::where('about', '2')->get()->all();
        $category3 = PartnershipCategory::where('about', '3')->get()->all();
        $category4 = PartnershipCategory::where('about', '4')->get()->all();
        return view('main.partnership', compact('category1', 'category2', 'category3', 'category4'));
    }

    public function pa_data() 
    {
        $data_e = Partnership::where('level', 'Expert')->get()->all();
        $data_p = Partnership::where('level', 'Professional')->get()->all();
        $data_as = Partnership::where('level', 'Associate')->get()->all();
        $data_au = Partnership::where('level', 'Authorized')->get()->all();

        $response_data = [
            'Expert' => $data_e,
            'Professional' => $data_p,
            'Associate' => $data_as,
            'Authorized' => $data_au,
        ];

        return response()->json($response_data);
    }

    public function p_data($id) 
    {
        $data_e = Partnership::where('id_category', $id)->where('level', 'Expert')->get()->all();
        $data_p = Partnership::where('id_category', $id)->where('level', 'Professional')->get()->all();
        $data_as = Partnership::where('id_category', $id)->where('level', 'Associate')->get()->all();
        $data_au = Partnership::where('id_category', $id)->where('level', 'Authorized')->get()->all();

        $response_data = [
            'Expert' => $data_e,
            'Professional' => $data_p,
            'Associate' => $data_as,
            'Authorized' => $data_au,
        ];

        return response()->json($response_data);
    }

    public function customer(Request $request) 
    {

        return view('main.customer');
    }

    public function ca_data() 
    {
        $data_1 = Customer::where('type', 1)->get()->all();
        $data_2 = Customer::where('type', 2)->get()->all();
        $data_3 = Customer::where('type', 3)->get()->all();
        $data_4 = Customer::where('type', 4)->get()->all();
        $data_5 = Customer::where('type', 5)->get()->all();
        $data_6 = Customer::where('type', 6)->get()->all();

        $response_data = [
            1 => $data_1,
            2 => $data_2,
            3 => $data_3,
            4 => $data_4,
            5 => $data_5,
            6 => $data_6,
        ];

        return response()->json($response_data);
    }

    public function c_data($id) 
    {
        $data_1 = Customer::where('type', 1)->whereHas('partner_section', function ($query) use ($id) {
            $query->where('about', $id);
        })->get()->all();
        $data_2 = Customer::where('type', 2)->whereHas('partner_section', function ($query) use ($id) {
            $query->where('about', $id);
        })->get()->all();
        $data_3 = Customer::where('type', 3)->whereHas('partner_section', function ($query) use ($id) {
            $query->where('about', $id);
        })->get()->all();
        $data_4 = Customer::where('type', 4)->whereHas('partner_section', function ($query) use ($id) {
            $query->where('about', $id);
        })->get()->all();
        $data_5 = Customer::where('type', 5)->whereHas('partner_section', function ($query) use ($id) {
            $query->where('about', $id);
        })->get()->all();
        $data_6 = Customer::where('type', 6)->whereHas('partner_section', function ($query) use ($id) {
            $query->where('about', $id);
        })->get()->all();

        $project1 = ProjectReference::where('type', 1)->whereHas('partner_section', function ($query) use ($id) {
            $query->where('about', $id);
        })->get()->first();
        $project2 = ProjectReference::where('type', 2)->whereHas('partner_section', function ($query) use ($id) {
            $query->where('about', $id);
        })->get()->first();
        $project3 = ProjectReference::where('type', 3)->whereHas('partner_section', function ($query) use ($id) {
            $query->where('about', $id);
        })->get()->first();
        $project4 = ProjectReference::where('type', 4)->whereHas('partner_section', function ($query) use ($id) {
            $query->where('about', $id);
        })->get()->first();
        $project5 = ProjectReference::where('type', 5)->whereHas('partner_section', function ($query) use ($id) {
            $query->where('about', $id);
        })->get()->first();
        $project6 = ProjectReference::where('type', 6)->whereHas('partner_section', function ($query) use ($id) {
            $query->where('about', $id);
        })->get()->first();

        $response_data = [
            1 => $data_1,
            2 => $data_2,
            3 => $data_3,
            4 => $data_4,
            5 => $data_5,
            6 => $data_6,
            'p1' => $project1,
            'p2' => $project2,
            'p3' => $project3,
            'p4' => $project4,
            'p5' => $project5,
            'p6' => $project6,
        ];

        return response()->json($response_data);
    }

    public function career() 
    {
        $data = Career::all();
        return view('main.career', compact('data'));
    }

    public function career_show($id) 
    {
        $data = Career::find($id);
        return response()->json($data);;
    }

    public function job($id) 
    {
        $data = Career::find($id);
        return view('main.join_job', compact('data'));
    }

    public function job_store(Request $request) 
    {
        $response = $request->all();

        $data = [
            'name' => $response['name'],
            'email' => $response['email'],
            'cv' => $response['cv'],
            'id_job' => $response['id_job'],
        ];

        $destination_path = 'public/file'; 
        $file = $request -> file('cv');
        $file_name = $file->getClientOriginalName(); 
        $path = $request->file('cv')->storeAs($destination_path, $file_name); 
        $data['cv'] = $file_name;

        JobRegist::create($data);
        return redirect('/career');
    }

    public function careerData($name) 
    {
        $dataa = Career::where('status', $name)->get()->all();
        return response()->json($dataa);
    }

    public function allData()
    {
        $dataT = Career::all();
        return response()->json($dataT);
    }

    public function message() 
    {
        return view('main.message');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quotation;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class QuotationController extends Controller
{
    public function index()
    {
        $data = Quotation::all();
        return view('admin.message.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $mail = new SendMail($data); // Membuat instance objek pesan email
        $mail->subject('Message Sinergy Website'); 
        $mail->from($data['email'], $data['name']);

        if($data['for'] = 'Quotation') {
            Mail::to('sales@sinergy.co.id')->send($mail);
        } else if($data['for'] = 'Career'){
            Mail::to('admin@sinergy.co.id')->send($mail);
        } else if ($data['for'] = 'Company Profile') {
            Mail::to('sales@sinergy.co.id')->send($mail);
        } else if ($data['for'] = 'Help Desk') {
            Mail::to('helpdesk@sinergy.co.id')->send($mail);
        }

        Quotation::create($data);        
    
        return back()->with('message', 'success send request');;        
    }

    public function show($id) 
    {
        $data = Quotation::find($id);
        return view('admin.message.detail', compact('data'));
    }

    public function destroy($id)
    {
        Quotation::find($id)->delete();
        return back();
    }
}

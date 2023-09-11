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
        return view('admin.quotation.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $mail = new SendMail($data); // Membuat instance objek pesan email
        $mail->subject('Request Quotation'); 
        $mail->from($data['email'], $data['first_name']);

        Mail::to('admin@sinergy.co.id')->send($mail);

        Quotation::create($data);        
    
        return back()->with('message', 'success send request');;        
    }

    public function show($id) 
    {
        $data = Quotation::find($id);
        return view('admin.quotation.detail', compact('data'));
    }

    public function destroy($id)
    {
        Quotation::find($id)->delete();
        return back();
    }
}

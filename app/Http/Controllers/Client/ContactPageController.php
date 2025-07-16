<?php

namespace App\Http\Controllers\Client;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactPageController extends Controller
{
    public function index(){
        $contact = Contact::first();

        return view('client.blades.contact', compact('contact'));
    }
}

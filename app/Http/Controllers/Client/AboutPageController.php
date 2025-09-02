<?php

namespace App\Http\Controllers\Client;

use App\Models\About;
use App\Models\Contact;
use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutPageController extends Controller
{
    public function index(){
        $abouts = About::active()->sorting()->get();
        $partners = Partner::active()->sorting()->get();
        $contact = Contact::first();

        return view('client.blades.about', compact('contact', 'partners', 'abouts'));
    }
}

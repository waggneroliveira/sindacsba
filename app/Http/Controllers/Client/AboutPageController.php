<?php

namespace App\Http\Controllers\Client;

use App\Models\About;
use App\Models\Contact;
use App\Models\Partner;
use App\Models\Statute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutPageController extends Controller
{
    public function index(){
        $abouts = About::active()->sorting()->get();
        $partners = Partner::active()->sorting()->get();
        $contact = Contact::first();
        $statute = Statute::first();

        return view('client.blades.about', compact('statute', 'contact', 'partners', 'abouts'));
    }
}

<?php

namespace App\Http\Controllers\Client;

use App\Models\About;
use App\Models\Contact;
use App\Models\Partner;
use App\Models\Statute;
use App\Models\Direction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutPageController extends Controller
{
    public function index(){
        $abouts = About::active()->sorting()->get();
        $partners = Partner::active()->sorting()->get();
        $contact = Contact::first();
        $statute = Statute::active()->first();
        $directions = Direction::active()->sorting()->get();

        return view('client.blades.about', compact('directions', 'statute', 'contact', 'partners', 'abouts'));
    }
}

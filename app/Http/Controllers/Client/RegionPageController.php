<?php

namespace App\Http\Controllers\Client;

use App\Models\Report;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Regional;

class RegionPageController extends Controller
{
    public function index(){
        $report = Report::active()->first();
        $contact = Contact::first();
        $regionais = Regional::active()->sorting()->get();

        return view('client.blades.regional', compact('contact', 'report', 'regionais'));
    }
}

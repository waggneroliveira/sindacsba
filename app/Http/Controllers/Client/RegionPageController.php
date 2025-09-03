<?php

namespace App\Http\Controllers\Client;

use App\Models\Report;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegionPageController extends Controller
{
    public function index(){
        $report = Report::active()->first();
        $contact = Contact::first();

        return view('client.blades.regional', compact('contact', 'report'));
    }
}

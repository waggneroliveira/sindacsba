<?php

namespace App\Http\Controllers\Client;

use App\Models\Report;
use App\Models\Contact;
use App\Models\Regional;
use App\Models\Municipality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegionPageController extends Controller
{
    public function index(){
        $report = Report::active()->first();
        $contact = Contact::first();
        $regionais = Regional::active()->sorting()->get();
        $municipalities = Municipality::with([
            'regional',
        ])->active()->sorting()->get();

        return view('client.blades.regional', compact('municipalities', 'contact', 'report', 'regionais'));
    }

    public function filterMunicipalities(Request $request)
    {
        $report = Report::active()->first();
        $contact = Contact::first();
        $regionais = Regional::active()->sorting()->get();
        $regionalId = $request->input('regional_id');
        $searchTerm = $request->input('search');
        
        $query = Municipality::with('regional');
        
        if ($regionalId !== 'all') {
            $query->where('regional_id', $regionalId);
        }
        
        if (!empty($searchTerm)) {
            $query->where('title', 'like', '%' . $searchTerm . '%');
        }
        
        $municipalities = $query->active()->sorting()->get();
        
        return view('client.ajax.municipality-ajax', compact('municipalities', 'contact', 'report', 'regionais'));
    }
}

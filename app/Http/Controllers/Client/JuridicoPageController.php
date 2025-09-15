<?php

namespace App\Http\Controllers\Client;

use App\Models\Report;
use App\Models\Juridico;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JuridicoPageController extends Controller
{
    public function index(){
        $juridicos = Juridico::active()->sorting()->get();
        $report = Report::active()->first();

        return view('client.blades.juridico', compact('report', 'juridicos'));
    }

    public function searchJuridico(Request $request)
    {
        $search = $request->input('search');
        $legal = $request->input('legal');
        $region = $request->input('region');
  
        $juridicos = Juridico::when($search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%");
            });
        })
        ->when($legal, function ($query, $legal) {
            $query->where('legal', $legal);
        })
        ->when($region, function ($query, $region) {
            $query->where('region', $region);
        })
        ->active()
        ->get();
        
        return view('client.ajax.juridico-ajax', compact('juridicos'));
    }
}

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
        $regionais = Regional::whereHas('municipalities')->active()->sorting()->get();
        $municipalities = Municipality::with([
            'regional',
        ])->active()->sorting()->paginate(50);

        return view('client.blades.regional', compact('municipalities', 'contact', 'report', 'regionais'));
    }

    public function filterMunicipalities(Request $request)
    {
        $regionalId = $request->input('regional_id', 'all');
        $searchTerm = $request->input('search', '');

        $query = Municipality::with('regional');

        if ($regionalId !== 'all') {
            $query->where('regional_id', $regionalId);
        }

        if (!empty($searchTerm)) {
            $query->where('title', 'like', '%' . $searchTerm . '%');
        }

        $municipalities = $query->active()->sorting()
            ->paginate(50)
            ->appends([
                'regional_id' => $regionalId,
                'search' => $searchTerm
            ]);

        // Se é AJAX, retorna só o partial (HTML)
        if ($request->ajax()) {
            return view('client.ajax.municipality-ajax', compact('municipalities'))->render();
        }

        // Se não é AJAX (usuário acessou via GET no navegador), redireciona para a página principal
        return redirect()->route('regional', [
            'regional_id' => $regionalId !== 'all' ? $regionalId : null,
            'search' => $searchTerm ?: null,
            'page' => $request->input('page') ?: null,
        ]);
    }

}

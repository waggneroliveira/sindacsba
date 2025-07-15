<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Noticies;
use Illuminate\Http\Request;

class NoticiesPageController extends Controller
{
    public function index(){
        $noticies = Noticies::active()->sorting()->get();

        $groupedNoticies = $noticies->groupBy(function($item) {
            return \Carbon\Carbon::parse($item->date)->format('Y');
        });

        // dd($groupedNoticies);
        return view('client.blades.notices', compact('groupedNoticies'));
    }
}

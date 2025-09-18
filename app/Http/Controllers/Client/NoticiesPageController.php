<?php

namespace App\Http\Controllers\Client;

use App\Models\Noticies;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NoticiesPageController extends Controller
{
    public function index(){
        $noticies = Noticies::active()->sorting()->get();
        $announcements = Announcement::active()
        ->sorting()
        ->where(function($query) {
            $query->whereNotNull('path_image')
                ->orWhereNotNull('path_image_mobile')
                ->orWhereNotNull('path_image_vertical');
        })
        ->get();
        $groupedNoticies = $noticies->groupBy(function($item) {
            return \Carbon\Carbon::parse($item->date)->format('Y');
        });

        // dd($groupedNoticies);
        return view('client.blades.notices', compact('groupedNoticies', 'announcements'));
    }
}

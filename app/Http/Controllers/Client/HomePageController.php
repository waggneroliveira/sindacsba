<?php

namespace App\Http\Controllers\Client;

use App\Models\Blog;
use App\Models\About;
use App\Models\Slide;
use App\Models\Stack;
use App\Models\Topic;
use App\Models\Video;
use App\Models\Partner;
use App\Models\Unionized;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\StackSessionTitle;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{
    public function index()
    {
        $slides = Slide::active()->sorting()->get();
        $blogSuperHighlights = Blog::whereHas('category', function($active){
            $active->where('active', 1);
        })->superHighlightOnly()->active()->sorting()->limit(6)->get();
        $blogHighlights = Blog::whereHas('category', function($active){
            $active->where('active', 1);
        })->highlightOnly()->active()->sorting()->limit(4)->get();
        $announcements = Announcement::active()->sorting()->get();
        $topics = Topic::sorting()->active()->get();
        $about = About::active()->first();
        $partners = Partner::active()->sorting()->get();
        $videos = Video::active()->sorting()->get();
        $unionized = Unionized::active()->first();

        return view('client.blades.index', compact('unionized', 'videos', 'partners', 'about', 'slides', 'blogSuperHighlights', 'blogHighlights', 'announcements', 'topics'));
    }
    
}

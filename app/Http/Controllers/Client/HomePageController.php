<?php

namespace App\Http\Controllers\Client;

use App\Models\Blog;
use App\Models\Slide;
use App\Models\Stack;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\StackSessionTitle;
use App\Http\Controllers\Controller;
use App\Models\Topic;

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
        
        return view('client.blades.index', compact('slides', 'blogSuperHighlights', 'blogHighlights', 'announcements', 'topics'));
    }
}

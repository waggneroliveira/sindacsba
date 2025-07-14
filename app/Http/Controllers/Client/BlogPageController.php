<?php

namespace App\Http\Controllers\Client;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogPageController extends Controller
{
    public function index()
    {
        $blogCategories = BlogCategory::whereHas('blogs')->active()->sorting()->get();
        $blogSuperHighlights = Blog::with('category')->superHighlightOnly()->active()->sorting()->limit(6)->get();
        $blogHighlights = Blog::with('category')->highlightOnly()->active()->sorting()->limit(4)->get();

        $superHighlightIds = $blogSuperHighlights->pluck('id');
        $highlightIds = $blogHighlights->pluck('id');        

        $excludedIds = $superHighlightIds->merge($highlightIds);

        $blogAll = Blog::with('category')
        ->whereHas('category')
        ->whereNotIn('id', $excludedIds)
        ->active()
        ->sorting()
        ->paginate(3);
        
        $blogSeeAlso = Blog::with('category')
        ->whereHas('category')
        ->whereNotIn('id', $excludedIds->merge($blogAll->pluck('id')))
        ->active()
        ->inRandomOrder()
        ->limit(4)
        ->get();

        return view('client.blades.blog', compact(
            'blogCategories',
            'blogSuperHighlights',
            'blogHighlights',
            'blogAll',
            'blogSeeAlso',
        ));
    }

}

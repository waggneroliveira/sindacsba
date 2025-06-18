<?php

namespace App\Http\Controllers\Client;

use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{
    public function index()
    {
        $slides = Slide::active()->sorting()->get();

        return view('client.blades.index', compact('slides'));
    }
}

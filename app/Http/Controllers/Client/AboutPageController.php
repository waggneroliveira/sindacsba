<?php

namespace App\Http\Controllers\Client;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutPageController extends Controller
{
    public function index(){
        $abouts = About::active()->sorting()->get();

        return view('client.blades.about', compact('abouts'));
    }
}

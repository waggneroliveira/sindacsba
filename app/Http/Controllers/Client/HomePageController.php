<?php

namespace App\Http\Controllers\Client;

use App\Models\Slide;
use App\Models\Stack;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StackSessionTitle;

class HomePageController extends Controller
{
    public function index()
    {
        $slides = Slide::active()->sorting()->get();
        $stacks = Stack::active()->sorting()->get();
        $stackSessionTitle = StackSessionTitle::active()->first();

        return view('client.blades.index', compact('slides', 'stacks', 'stackSessionTitle'));
    }
}

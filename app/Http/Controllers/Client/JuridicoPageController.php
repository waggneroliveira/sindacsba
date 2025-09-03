<?php

namespace App\Http\Controllers\Client;

use App\Models\Juridico;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JuridicoPageController extends Controller
{
    public function index(){
        $juridicos = Juridico::active()->sorting()->get();

        return view('client.blades.juridico', compact('juridicos'));
    }
}

<?php

namespace App\Http\Controllers\Client;

use App\Models\Unionized;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BenefitPageController extends Controller
{
        public function index(){
        $unionized = Unionized::active()->first();
 
        return view('client.blades.unionized', compact('unionized'));
    }
}

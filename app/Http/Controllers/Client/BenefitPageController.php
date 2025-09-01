<?php

namespace App\Http\Controllers\Client;

use App\Models\Unionized;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BenefitTopic;

class BenefitPageController extends Controller
{
        public function index(){
        $unionized = Unionized::active()->first();
        $benefitTopics = BenefitTopic::active()->sorting()->get();
 
        return view('client.blades.unionized', compact('unionized', 'benefitTopics'));
    }
}

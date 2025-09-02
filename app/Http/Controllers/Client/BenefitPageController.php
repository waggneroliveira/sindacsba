<?php

namespace App\Http\Controllers\Client;

use App\Models\Report;
use App\Models\Agreement;
use App\Models\Unionized;
use App\Models\BenefitTopic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BenefitPageController extends Controller
{
        public function index(){
        $unionized = Unionized::active()->first();
        $benefitTopics = BenefitTopic::active()->sorting()->get();
        $report = Report::active()->first();
        $agreement = Agreement::active()->first();

        return view('client.blades.unionized', compact('agreement', 'report', 'unionized', 'benefitTopics'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index(){
        $currentUser = Auth::user();
        $user = User::where('id', $currentUser->id)->active()->first();

        if (isset($user)) {
            return view('admin.dashboard');
        }
        return redirect()->route('admin.dashboard.painel');
    }
}

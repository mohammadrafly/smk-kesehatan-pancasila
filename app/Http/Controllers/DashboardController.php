<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return view('dashboard.index');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        return view('profile.index', [
            'user' => $user,
            'pages' => 'Profile',
            'email' => Auth::user()->email,
            'name'  => Auth::user()->name,
        ]);
    }
}

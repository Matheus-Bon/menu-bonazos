<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexClientController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $admin = User::role('admin')->get();

        

        return Inertia::render('Client/Index', [
            
            'user' => $user
            
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexClientController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        return Inertia::render('Client/Index', [
            
            'user' => $user
            
        ]);
    }
}

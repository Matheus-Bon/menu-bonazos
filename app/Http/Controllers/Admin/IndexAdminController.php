<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexAdminController extends Controller
{
    public function index()
    {
        return inertia('Admin/Dashboard');
    }

    public function table()
    {
        return inertia('Admin/Table');
    }

    public function menu()
    {
        return inertia('Admin/Menu');
    }
}

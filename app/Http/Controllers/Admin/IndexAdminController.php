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

    public function orders()
    {
        return inertia('Admin/Orders');
    }

    public function tables()
    {
        return inertia('Admin/Tables');
    }

    public function delivery()
    {
        return inertia('Admin/Delivery');
    }

    public function schedule()
    {
        return inertia('Admin/Schedule');
    }

    public function timetable()
    {
        return inertia('Admin/Timetable');
    }

    public function evaluations()
    {
        return inertia('Admin/Evaluations');
    }
}

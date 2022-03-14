<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobsController extends Controller
{
    //
    public function __construct()
    {
      return $this->middleware('auth');
    }

    public function jobDashboard()
    {
        return view('jobs.dashboard');
    }
}

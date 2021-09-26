<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function main()
    {
        return view('dashboard.main');
    }

    public function revenus()
    {
        return view('dashboard.revenus');
    }
}

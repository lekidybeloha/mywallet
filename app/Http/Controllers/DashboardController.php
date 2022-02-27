<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    /**
     * Show main dashboard
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function main()
    {
        return view('dashboard.main');
    }
}

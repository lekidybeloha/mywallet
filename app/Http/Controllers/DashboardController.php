<?php

namespace App\Http\Controllers;

use App\Handlers\RedirectHandler;
use App\Models\Total;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function setUserTotal(Request $verb)
    {
        $total          = Total::where('id_user', '=', Auth::id())->first();
        $total->montant = $verb->input('montant');
        $total->save();
        $user           = User::find(Auth::id());
        $user->is_first = false;
        $user->save();
        $redirect       = new RedirectHandler();
        return $redirect->redirect($total);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}

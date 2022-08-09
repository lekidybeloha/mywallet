<?php

namespace App\Http\Controllers;

use App\Models\Total;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Log;

class MainController extends Controller
{
    //
    public function register(Request $verb)
    {
        $data               = $verb->except(['_token', 'password_confirm']);
        $check              = User::where('email', '=', $data['email'])->first();
        if($check)
        {
            return redirect()->back()->withErrors(["L'email que vous avez insérer existe déjà !"]);
        }

        $user               = new User();
        $user->name         = $data['name'];
        $user->email        = $data['email'];
        $user->password     = Hash::make($data['password']);
        $user->save();

        $total              = new Total();
        $total->id_user     = $user->id;
        $total->montant     = 0;
        $total->depense     = 0;
        $total->save();

        return view('success');
    }

    public function login(Request $verb)
    {
        $data   = $verb->except('_token');
        $check  = Auth::attempt($data);
        if($check)
        {
            return redirect()->route('dashboard');
        }
        else
        {
            return redirect()->back()->withErrors(["L'email ou mot de passe invalide !"]);
        }
    }
    
    public function callback(Request $verb)
    {
        Log::info("REQUEST", $verb->all());
    }
}

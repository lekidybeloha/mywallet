<?php

namespace App\Handlers;

class RedirectHandler
{
    public function redirect($response)
    {
        if($response)
        {
            $status     = 'success';
            $message    = 'Enregistrement effectué avec succès';
        }
        else
        {
            $status     = 'error';
            $message    = 'Une erreur est survenu, veuillez réessayer plus tard';
        }
        return redirect()->back()->with($status, $message);
    }
}

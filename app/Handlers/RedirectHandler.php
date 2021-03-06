<?php

namespace App\Handlers;

class RedirectHandler
{
    /**
     * Redirector after a response
     * @param $response
     * @return \Illuminate\Http\RedirectResponse
     */
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

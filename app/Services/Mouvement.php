<?php

namespace App\Services;

use App\Models\Mouvement as Move;
use App\Models\Total;

class Mouvement
{
    public function move($id_user, $montant, $source = 0)
    {
        $move               = new Move();
        $move->id_user      = $id_user;
        $move->montant      = $montant;
        $move->source       = $source;
        $move->save();
        $userTotal          = Total::where('id_user', '=', $id_user)->first();
        $userTotal->montant += $montant;
        if($montant < 0)
            $userTotal->depense += abs($montant);

        $userTotal->save();
    }
}

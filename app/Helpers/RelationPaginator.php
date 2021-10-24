<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class RelationPaginator
{
    public function getUserRelationWithPagination($relation)
    {
        if(!Auth::user()->$relation)
        {
            return null;
        }
        return Auth::user()->$relation()->paginate(20);
    }
}

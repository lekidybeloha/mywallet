<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class RelationPaginator
{
    /**
     * User Helpers to get data with pagination(default 20)
     * @param $relation
     * @return null
     */
    public function getUserRelationWithPagination($relation)
    {
        if(!Auth::user()->$relation)
        {
            return null;
        }
        return Auth::user()->$relation()->paginate(20);
    }
}

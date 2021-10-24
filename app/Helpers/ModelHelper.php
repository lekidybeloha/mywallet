<?php

namespace App\Helpers;


use Illuminate\Support\Facades\Auth;

class ModelHelper
{
    public function modelSave($model, $fields)
    {
        $fullName       = 'App\Models\\'.$model;
        $save           = new $fullName();
        $save->id_user  = Auth::id();
        foreach($fields as $index => $one)
        {
            $save->$index = $one;
        }

        return $save->save();
    }
}

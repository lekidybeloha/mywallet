<?php

namespace App\Helpers;


use Illuminate\Support\Facades\Auth;

class ModelHelper
{
    /**
     * Helpers to save model value instead of adding multiple line in each controller to save data
     * @param $model
     * @param $fields
     * @return mixed
     */
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

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function employes()
    {
        return $this->hasMany('App\Employe');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    public function employes()
    {
        return $this->belongsTo('App\Employe');
    }
}

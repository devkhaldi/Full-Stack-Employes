<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    public function job()
    {
        return $this->belongsTo('App\Job');
    }
    public function departement()
    {
        return $this->belongsTo('App\Departement');
    }
}

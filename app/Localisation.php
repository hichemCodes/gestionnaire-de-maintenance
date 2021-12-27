<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localisation extends Model
{
    public function resources()
    {
        return $this->hasMany(Resource::class);
    }

    public function amolalies()
    {
        return $this->hasMany(Anomalie::class);
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anomalie extends Model
{
    public function localisation()
    {
        return $this->belongsTo(Localisation::class);
    }

    public function resource()
    {
        return $this->belongsTo(Resource::class);
    }
}

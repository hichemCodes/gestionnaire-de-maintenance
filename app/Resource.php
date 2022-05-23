<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = [];

    public function localisation()
    {
        return $this->belongsTo(Localisation::class);
    }

    public function responsable()
    {
        return $this->belongsTo(User::class);
    }

    public function anomalies()
    {
        return $this->hasMany(Anomalie::class);
    }
}

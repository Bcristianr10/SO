<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class padre extends Model
{
    use HasFactory;
    protected $table = "padre";

    public function corregimiento()
    {
        return $this->belongsTo('App\Models\corregimiento');
    }

    public function familia()
    {
        return $this->belongsTo('App\Models\familia');
    }

    public function pais()
    {
        return $this->belongsTo('App\Models\pais');
    }

    public function ocupacion()
    {
        return $this->belongsTo('App\Models\ocupacion');
    }

    public function pareja(){

        return $this->belongsTo('App\Models\padre')->where('id',$this->pareja_id)->first();
    }

    public function hijos()
    {
        return $this->hasMany('App\Models\padreHijo');
    }

    public function carpeta()
    {
        return $this->belongsTo('App\Models\carpeta');
    }
}

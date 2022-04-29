<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hijo extends Model
{
    use HasFactory;
    protected $table = "hijo";

    public function corregimiento()
    {
        return $this->belongsTo('App\Models\corregimiento');
    }

    public function pais()
    {
        return $this->belongsTo('App\Models\pais');
    }

    public function padre(){
       
        return $this->hasMany('App\Models\padreHijo')->where('parentesco',1)->first();
    
    }

    public function madre(){
       
        return $this->hasMany('App\Models\padreHijo')->where('parentesco',2)->first();
    
    }

    public function carpeta()
    {
        return $this->belongsTo('App\Models\carpeta');
    }

}

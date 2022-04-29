<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seguimiento extends Model
{
    use HasFactory;
    protected $table = "seguimiento";

    public function comentario()
    {
        return $this->belongsTo('App\Models\comentario');
    }

    public function tipo()
    {
        return $this->belongsTo('App\Models\estado');
    }
}

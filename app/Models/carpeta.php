<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carpeta extends Model
{
    use HasFactory;
    protected $table = "carpeta";

    public function archivos()
    {
        return $this->hasMany('App\Models\archivo');
    }

    public function seguimientos()
    {
        return $this->hasMany('App\Models\seguimiento');
    }
}

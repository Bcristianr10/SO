<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class distrito extends Model
{
    use HasFactory;
    protected $table = "distrito";

    public function provincia()
    {
        return $this->belongsTo('App\Models\provincia');
    }
}

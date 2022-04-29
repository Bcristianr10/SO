<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class corregimiento extends Model
{
    use HasFactory;
    protected $table = "corregimiento";

    public function distrito()
    {
        return $this->belongsTo('App\Models\distrito');
    }
}

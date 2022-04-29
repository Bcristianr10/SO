<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class padreHijo extends Model
{
    use HasFactory;
    protected $table = "padre_hijo";

    public function hijo()
    {
        return $this->belongsTo('App\Models\hijo');
    }

    public function padre()
    {
        return $this->belongsTo('App\Models\padre');
    }
}

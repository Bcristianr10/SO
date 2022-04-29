<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;
    protected $table = "blog";

    public function foto_blogs()
    {
        return $this->hasMany('App\Models\fotoBlog');
    }

    public function principal()
    {
        return $this->hasMany('App\Models\fotoBlog')->where('tipo',1)->first();
    }

    public function galeria()
    {
        return $this->hasMany('App\Models\fotoBlog')->where('tipo',2)->paginate(3);
    }



}

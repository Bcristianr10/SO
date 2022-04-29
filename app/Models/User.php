<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "user";

     
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rol()
    {
        return $this->belongsTo('App\Models\rol');
    }

    public function notificaciones()
    {
        return $this->hasMany('App\Models\notification','notifiable_id')->where('read_at',null)->orderBy('created_at','desc')->get();
    }

    public function cantidad_notificaciones()
    {
        return $this->hasMany('App\Models\notification','notifiable_id')->where('read_at',null)->count();
    }

    public function cantidad_mensajes_sin_leer()
    {
        return $this->hasMany('App\Models\notification','notifiable_id')->where('read_at',null)->where('type','App\Notifications\nuevoMensaje')->count();
    }

    public function notificaciones_mensajes()
    {
        return $this->hasMany('App\Models\notification','notifiable_id')->where('type','App\Notifications\nuevoMensaje')->get();
    }

    public function notificaciones_mensajes_sin_leer()
    {
        return $this->hasMany('App\Models\notification','notifiable_id')->where('read_at',null)->where('type','App\Notifications\nuevoMensaje')->get();
    }
}

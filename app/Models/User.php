<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    

    protected $table = "users";

    protected $primaryKey = "id";


    protected $fillable = [
        'nama', 'nim', 'email', 'password','foto_profil',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //relationship
    public function biodata()
    {
        return $this->hasOne('App\Models\Biodata', 'users_id');
        
    }
    
    public function legalisirtranskrip()
    {
        return $this->hasMany('App\Models\LegalisasiTranskrip','users_id');
    }

    public function suratketeranganaktif()
    {
        return $this->hasMany('App\Models\SuratKeteranganAktif','users_id');
    }

    public function suratketeranganlulus()
    {
        return $this->hasMany('App\Models\SuratKeteranganLulus','users_id');
    }
    
    public function suratpengundurandiri()
    {
        return $this->hasMany('App\Models\SuratPengunduranDiri','users_id');
    }

    public function suratperpanjanganmasastudi()
    {
        return $this->hasMany('App\Models\SuratPerpanjanganMasaStudi','users_id');
    }

}

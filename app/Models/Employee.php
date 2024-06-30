<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['email', 'password',];
    protected $hidden = ['password', 'remember_token'];

    public function pekerjaan(){
        return $this->hasMany(Pekerjaan::class);
    }
    public function pendidikan(){
        return $this->hasOne(Pendidikan::class);
    }
    public function pelatihan(){
        return $this->hasMany(Pelatihan::class);
    }
}

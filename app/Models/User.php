<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Redis;
use Laravel\Sanctum\HasApiTokens;
use phpDocumentor\Reflection\Types\Null_;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
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

    public function books(){
        // excluding soft delete row with where condition
        return $this->belongsToMany(Books::class, Rented::class)->orderByPivot('id', 'desc')->where('renteds.deleted_at', null);
    }

    public function rentHistory(){
        return $this->belongsToMany(Books::class, Rented::class)->orderByPivot('renteds.deleted_at', 'desc')->where('renteds.deleted_at', '!=' ,null);
    }

    public function deletedRentedBooks(){
        return $this->hasMany(Rented::class)->onlyTrashed()->orderBy('renteds.deleted_at', 'desc');
    }

    public function rentedBooks(){
        return $this->hasMany(Rented::class);
    }
}

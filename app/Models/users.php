<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class users extends Authenticatable
{
    use HasFactory, Notifiable;



    protected $fillable = [
        'email',
        'password',
        'first_name',
        'middle_name',
        'last_name',
        'birthdate',
        'full_address',
        'user_type_id',
        'branch_assigned',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'birthdate' => 'date',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branchprofile extends Model
{
    use HasFactory;


    protected $fillable = [
        'branch_name',
        'branch_code',
        'country_iso_code',
    ];
}

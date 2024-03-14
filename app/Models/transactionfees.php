<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionFee extends Model
{
    use HasFactory;


    protected $fillable = [
        'min_amt',
        'max_amt',
        'tiered_fee_1_min_amt',
        'tiered_fee_1_max_amt',
        'tiered_fee_1_rate',
        'tiered_fee_2_min_amt',
        'tiered_fee_2_max_amt',
        'tiered_fee_2_rate',
        'tiered_fee_3_min_amt',
        'tiered_fee_3_max_amt',
        'tiered_fee_3_rate',
        'tiered_fee_4_min_amt',
        'tiered_fee_4_max_amt',
        'tiered_fee_4_rate',
        'tiered_fee_5_min_amt',
        'tiered_fee_5_max_amt',
        'tiered_fee_5_rate',
        'tiered_fee_6_min_amt',
        'tiered_fee_6_max_amt',
        'tiered_fee_6_rate',
        'tiered_fee_7_min_amt',
        'tiered_fee_7_max_amt',
        'tiered_fee_7_rate',
        
        
    ];
}

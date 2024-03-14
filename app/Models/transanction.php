<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;



    protected $fillable = [
        'reference_number',
        'sender_name',
        'sender_contact',
        'recipient_name',
        'recipient_contact',
        'transaction_type',
        'amount_local_currency',
        'currency_conversion_code',
        'amount_converted',
        'transaction_status',
        'branch_sent_id', 
        'branch_received_id', 
        'transfer_fee_id',
        'datetime_transaction',
    ];

    // Define relationships (optional)
    public function senderBranch()
    {
        return $this->belongsTo(Branch::class, 'branch_sent_id');
    }

    public function receiverBranch()
    {
        return $this->belongsTo(Branch::class, 'branch_received_id');
    }

    public function transferFee()
    {
        return $this->belongsTo(TransactionFee::class);
    }
}

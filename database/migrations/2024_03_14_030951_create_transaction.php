<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('referencenumber');
            $table->string('sender_name');
            $table->string('recipient_name');
            $table->string('recipient_contact');
            $table->string('transaction_type');
            $table->integer('amount_local_currency');
            $table->string('currency_conversion_code');
            $table->integer('amount_converted');
            $table->string('transaction_status');
            
            //foreign key 
            $table->unsignedBigInteger('first_name');  
            $table->unsignedBigInteger('first_name');  
            $table->foreign('first_name')->references('first_name') ->on('userinfo');  

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};

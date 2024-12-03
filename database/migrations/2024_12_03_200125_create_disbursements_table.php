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
        Schema::create('disbursements', function (Blueprint $table) {
            $table->id();
            $table->string('recipient_bank');
            $table->string('recipient_account');
            $table->decimal('amount', 15, 2);
            $table->string('partner_trx_id');
            $table->string('note')->nullable();
            $table->string('email')->nullable();
            $table->json('additional_data')->nullable();
            $table->enum('status', ['pending', 'success', 'failed'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disbursements');
    }
};

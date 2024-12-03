<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDisbursementsTableAddAdditionalData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('disbursements', function (Blueprint $table) {
            // Menambahkan kolom additional_data dengan tipe JSON
            $table->json('additional_data')->nullable()->after('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('disbursements', function (Blueprint $table) {
            // Menghapus kolom additional_data jika rollback
            $table->dropColumn('additional_data');
        });
    }
}

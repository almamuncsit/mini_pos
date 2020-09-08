<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNoteToSalesAndPurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sale_invoices', function (Blueprint $table) {
            $table->text('note')->nullable()->after('date');
        });
        Schema::table('purchase_invoices', function (Blueprint $table) {
            $table->text('note')->nullable()->after('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sale_invoices', function (Blueprint $table) {
            $table->dropColumn('note');
        });
        Schema::table('purchase_invoices', function (Blueprint $table) {
            $table->dropColumn('note');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       //verified_by should be nullable

        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number');
            $table->longText('verification_attachments')->nullable();
            $table->boolean('verified')->default(false);
            $table->foreignId('verified_by')->constrained('users')->onDelete('cascade');
            $table->longText('verification_error')->nullable();
            $table->date('expiry_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}

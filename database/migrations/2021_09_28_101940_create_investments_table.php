<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //invoice_id should be nullable
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('invoice_id')->constrained()->onDelete('cascade')->nullable();
            $table->unsignedInteger('units');
            $table->unsignedBigInteger('amount');
            $table->boolean('verified')->default(false);
            $table->unsignedTinyInteger('status')->default('2')->comment('1-Active,2-Inactive,3-Ended');
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
        Schema::dropIfExists('investments');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->foreignId('investor_id')->constrained('users')->onDelete('cascade');
            $table->unsignedBigInteger('amount');
            $table->tinyInteger('ROI_period')->nullable();
            $table->timestamp('next_ROI')->nullable();
            $table->timestamp('start_date')->comment('Date for when the payments where made');
            $table->timestamp('end_date')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}

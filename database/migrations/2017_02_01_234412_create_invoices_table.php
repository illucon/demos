<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('students_id')->unsigned();
            $table->integer('account_items_id')->unsigned();
            
            //$table->string('user_id'); //student or teacher
            //$table->string('type'); // income or expense
            $table->string('receivable_amount');
            $table->string('paid_amount')->default('0');
            $table->tinyInteger('status')->default('0');
            $table->text('note');
            
            $table->string('created_by'); //admin or users
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('students_id')->references('id')->on('students');
            $table->foreign('account_items_id')->references('id')->on('account_items');
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

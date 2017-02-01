<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_items', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('account_item_name');
            $table->string('account_item_price');
            
            $table->integer('account_heads_id')->unsigned();
            $table->foreign('account_heads_id')->references('id')->on('account_heads');
            
            $table->string('created_by'); //admin or users
            
            $table->softDeletes();
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
        Schema::dropIfExists('account_items');
    }
}

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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('ProductId');
            $table->string('ProductName');
            $table->integer('Qty');
            $table->float('Price');
            $table->float('Tax');
            $table->float('Total');
            $table->float('Desc');
            $table->float('Net');
            $table->integer('UserId');
            $table->string('UserName');
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

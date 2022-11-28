<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //$table->foreign('user_Name')->references('name')->on('users');
            $table->foreignId('user_id')->constrained();
            $table->string('status');
            $table->set('shippingType',['Fast', 'Standard']);
            $table->double('shippingCost');
            $table->set('shippingRegion',['Spain', 'Portugal','Andorra']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

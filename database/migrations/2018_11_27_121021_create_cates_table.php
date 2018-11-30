<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id')->comment('主键id');
            $table->unsignedInteger('product_id')->comment('产品id');
            $table->string('choose_prop_values',20)->comment('用户选择的所有属性值id');
            $table->unsignedInteger('choose_number')->comment('用户选择的该产品数量');
            $table->string('product_prices',60)->comment('该产品（单价*数量）的总价钱 ');
            $table->unsignedInteger('user_id')->comment('用户表id');
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
        Schema::dropIfExists('orders');
    }
}

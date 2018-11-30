<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prop_values', function (Blueprint $table) {
            $table->increments('id')->comment('主键id');
            $table->string('name')->comment('产品属性值 名称');
            $table->unsignedInteger('prop_name_id')->comment('产品属性名 id');
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
        Schema::dropIfExists('prop_values');
    }
}

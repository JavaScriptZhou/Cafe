<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->comment('主键id');
            $table->string('name',50)->default('')->comment('产品名称');
            $table->string('price',50)->default('')->comment('产品价格');
            $table->text('detail')->default('')->comment('产品描述');
            $table->string('photo_size',20)->default('1:1')->comment('产品图片宽高比');
            $table->string('photo',150)->default('')->comment('产品图片上传路径');
            $table->unsignedInteger('recommend')->default(0)->comment('店家推荐');
            $table->string('prop_names',20)->default('1,2,3,4')->comment('产品所有属性名id');
            $table->string('prop_values',50)->default('')->comment('产品所有属性可能值id');
            $table->string('prop_defaults',20)->default('0,0,0,0')->comment('产品所有属性对应默认值');
            $table->unsignedInteger('sell')->default(0)->comment('产品销量');
            $table->unsignedInteger('cate_id')->default(0)->comment('产品分类id');
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
        Schema::dropIfExists('products');
    }
}

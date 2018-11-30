<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cates', function (Blueprint $table) {
            $table->increments('id')->comment("主键");
            $table->string('name',50)->default('')->comment('分类主题名称');  //创建标题name字段【title varchar(50) not null default ''】
            $table->string('english_name',100)->default('')->comment('分类主题英文名称');
            $table->string('des',255)->default('')->comment('分类主题描述');
            $table->string('photo',255)->default('');
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
        Schema::dropIfExists('cates');
    }
}

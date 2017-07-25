<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSysIndustryCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_industry_category', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('c1');
            $table->string('n1');
            $table->integer('c2');
            $table->string('n2');
            $table->integer('cuid')->nullable();
            $table->dateTime('ctime')->nullable();
            $table->integer('muid')->nullable();
            $table->dateTime('mtime')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_industry_category');
    }
}

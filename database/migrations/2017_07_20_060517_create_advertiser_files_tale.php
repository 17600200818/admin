<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertiserFilesTale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertiser_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('buyer_id');
            $table->integer('advertiser_id');
            $table->string('code')->comment('资质文件编号');
            $table->string('name')->comment('资质主题名称');
            $table->string('file_path')->comment('资质文件的相对路径');
            $table->integer('status')->comment('1:待审核 2:审核通过 3:审核不通过 4:通用');
            $table->integer('cuid')->default(0);
            $table->integer('muid')->default(0);
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
        Schema::dropIfExists('advertiser_files');
    }
}

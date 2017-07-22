<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creatives', function (Blueprint $table) {
            $table->increments('id');
            $table->string('buyer_crid')->comment('买方的素材id');
            $table->integer('buyer_id');
            $table->integer('buyer_advertiser_id')->comment('买方广告主id');
            $table->integer('advertiser_id')->comment('广告主id');
            $table->string('url')->comment('买方的文件url路径');
            $table->string('file_path')->comment('缓存到本地的路径');
            $table->integer('file_ext')->comment('文件的扩展名id');
            $table->integer('width');
            $table->integer('height');
            $table->integer('category1')->comment('所属行业一级分类');
            $table->integer('category2')->comment('所属行业二级分类');
            $table->integer('file_size')->comment('文件大小');
            $table->string('duration')->comment('视频文件播放时长');
            $table->integer('action_type');
            $table->string('click_url')->comment('点击跳转地址');
            $table->string('landing_page')->comment('点击后的落地页');
            $table->string('imptrackers')->comment('曝光监测地址');
            $table->string('clktrackers')->comment('点击监测地址');
            $table->integer('status')->comment('1:待审核 2:审核通过 3:审核不通过');
            $table->string('expiration_date');
            $table->string('md5Id');
            $table->string('remark');
            $table->integer('cuid');
            $table->integer('muid');
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
        Schema::dropIfExists('creatives');
    }
}

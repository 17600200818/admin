<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('buyer_id');
            $table->string('buyer_advertiser_id')->comment('买方广告主id');
            $table->integer('category1')->nullable();
            $table->integer('category2')->nullable();
            $table->string('site_name')->nullable();
            $table->string('domain');
            $table->string('address')->nullable();
            $table->string('zip')->nullable();
            $table->string('tel')->nullable();
            $table->string('linkman')->nullable();
            $table->string('status')->comment('1:待审核;2:正常;3:审核不通过,4:停用');
            $table->string('remark')->comment('备注')->nullable();
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
        Schema::dropIfExists('advertisers');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique()->comment('名字');
            $table->string('password');
            $table->integer('role_id');
            $table->string('linkman')->comment('联系人');
            $table->string('tel')->comment('电话号码');
            $table->integer('buy_type')->comment('1:rtb 2:adn');
            $table->integer('creative_audit_type')->comment('1:先投后审 2:先审后投');
            $table->string('company')->comment('公司名称');
            $table->string('address')->comment('公司地址');
            $table->string('zip')->comment('邮编');
            $table->integer('gain_type')->comment('盈利模式 1:成交价上浮');
            $table->integer('gain_rate')->comment('盈利比例');
            $table->string('last_login_ip')->comment('最后登录ip');
            $table->string('status')->comment('1:待审核;2:正常;3:审核不通过,4:停用');
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
        Schema::table('buyers', function (Blueprint $table) {
            Schema::dropIfExists('buyers');
        });
    }
}

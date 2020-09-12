<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username')->unique();
            $table->string('nickname')->nullable()->comment('昵称');
            $table->string('phone', 11)->nullable()->unique()->comment('电话');
            $table->string('avatar')->nullable()->comment('头像');
            $table->date('birthday')->nullable()->comment('生日');
            $table->tinyInteger('gender')->default(0)->comment('性别 0-未设置 1-男 2-女 3-其他');
            $table->string('email')->unique()->nullable()->comment('邮箱');
            $table->timestamp('email_verified_at')->nullable()->comment('邮箱验证时间');
            $table->string('wechat_open_id')->nullable()->comment('微信 open_id');
            $table->string('wechat_union_id')->nullable()->comment('微信 union_id');
            $table->tinyInteger('status')->default(1)->comment('账号状态 1-正常 2-已封禁');
            $table->string('password');
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}

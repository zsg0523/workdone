<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name')->comment('姓名');
            $table->boolean('sex')->comment('性别 0女 1男');
            $table->string('idd_code')->default('86')->comment('区号');
            $table->string('phone')->nullable()->unique()->comment('手机号');
            $table->string('avatar')->nullable()->comment('头像');
            $table->string('email')->nullable()->unique()->comment('邮箱');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('description')->nullable()->comment('描述');
            $table->rememberToken();
            $table->string('last_actived_at')->nullable();
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

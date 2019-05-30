<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLastChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('last_chats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned()->index();
            $table->text('conversation')->nullable()->comment('对话记录');
            $table->string('image')->nullable()->comment('聊天截图');
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
        Schema::dropIfExists('last_chats');
    }
}

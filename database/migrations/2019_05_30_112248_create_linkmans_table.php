<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkmansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linkmans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned()->index();
            $table->string('name')->nullable()->index()->comment('姓名');
            $table->string('title')->nullable()->index()->comment('职位');
            $table->string('card')->nullable()->comment('名片');
            $table->string('phone')->nullable()->index();
            $table->string('email')->nullable()->index();
            $table->string('wechat')->nullable()->index();
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
        Schema::dropIfExists('linkmans');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index()->comment('公司名称');
            $table->string('address')->nullable()->index()->comment('公司地址');
            $table->string('scale')->nullable()->comment('公司规模');
            $table->string('file')->nullable()->comment('公司资料/画册');
            $table->string('business')->nullable()->comment('公司主营业务');
            $table->string('field')->nullable()->comment('公司专注领域');
            $table->string('product')->nullable()->comment('成品或落地项目');
            $table->string('push_product')->nullable()->comment('公司主推成品');
            $table->string('technology')->nullable()->comment('技术亮点');
            $table->string('corporation')->nullable()->comment('有无合作团队');
            $table->string('intention')->nullable()->comment('意向/对什么感兴趣');
            $table->string('develop')->nullable()->comment('有无机会合作');
            $table->string('way')->nullable()->comment('认识途径');
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
        Schema::dropIfExists('companies');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conpon', function (Blueprint $table) {
            $table->increments('coupon_id');
            $table->string('coupon_code');
            $table->string('coupon_name');// 1: Phần trăm, 2: Số tiền
            $table->decimal('coupon_times');
            $table->integer('coupon_condition');
            $table->string('coupon_number');
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
        Schema::dropIfExists('conpons');
    }
};

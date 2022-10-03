<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('logistic_work_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('logistic_id');
            $table->unsignedBigInteger('work_order_id');
            $table->text('keterangan');
            $table->foreign('logistic_id')->references('id')->on('logistics')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('work_order_id')->references('id')->on('work_orders')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('logistic_work_order');
    }
};

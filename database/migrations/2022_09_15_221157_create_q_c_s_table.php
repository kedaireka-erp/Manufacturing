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
        Schema::create('q_c_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId("work_order_id")->constrained("work_orders")->onUpdate("cascade");
            $table->string("subkon")->nullable();
            $table->string("alasan")->nullable();
            $table->text("keterangan")->nullable();
            $table->enum("status", ["REJECTED", "OK!"])->nullable();
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
        Schema::dropIfExists('q_c_s');
    }
};

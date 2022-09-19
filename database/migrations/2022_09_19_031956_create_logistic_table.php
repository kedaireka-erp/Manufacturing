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
        Schema::create('logistic', function (Blueprint $table) {
            $table->id();
            $table->foreignId("fppp_id")->constrained("f_p_p_p_s")->onUpdate("cascade");
            $table->string('no_logistic')->nullable();
            $table->date('tgl_input')->nullable();
            $table->date('tgl_berangkat')->nullable();
            $table->string('driver')->nullable();
            $table->string('no_polisi')->nullable();
            $table->text('alamat')->nullable();
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
        Schema::dropIfExists('logistic');
    }
};

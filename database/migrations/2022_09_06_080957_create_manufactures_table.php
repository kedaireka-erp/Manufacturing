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
        Schema::create('manufactures', function (Blueprint $table) {
            $table->id();
            $table->string("FPPP_number");
            $table->string("project_name");
            $table->string("applicator_name");
            $table->string("file_bom_alumunium")->nullable();
            $table->string("file_bom_aksesoris")->nullable();
            $table->string("file_wo_alumunium")->nullable();
            $table->string("file_wo_kaca")->nullable();
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
        Schema::dropIfExists('manufactures');
    }
};

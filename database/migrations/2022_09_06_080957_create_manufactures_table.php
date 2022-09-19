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
            $table->string("file_detail_wo")->nullable();
            $table->string("file_wo_potong_alumunium")->nullable();
            $table->string("production_phase")->nullable();
            $table->string("user_name")->nullable();
            $table->string("production_time")->nullable();
            $table->string("color")->nullable();
            $table->string("glass_type")->nullable();
            $table->text("note")->nullable();
            $table->integer("quotation_id")->nullable();
            $table->enum("fppp_type", ["produksi", "memo"])->nullable();
            $table->enum("order_status", ["baru", "tambahan", "revisino", "lainlain"])->nullable();
            $table->enum("glass", ["included", "excluded", "included_excluded"])->nullable();
            $table->boolean("box_usage")->nullable();
            $table->boolean("sealant_usage")->nullable();
            $table->boolean("delivery_to_expedition")->nullable();
            $table->date("retrieval_deadline")->nullable();
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
        Schema::dropIfExists('manufactures');
    }
};

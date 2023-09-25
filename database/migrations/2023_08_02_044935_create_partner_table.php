<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->text('image');
            $table->enum('level', ['Excelent', 'Greate', 'Good', 'Authorized']);
            $table->integer('id_category')->unsigned();
            $table->foreign('id_category')->references('id')->on('partner_section')->onDelete('cascade');
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
        Schema::dropIfExists('partner');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblHotel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hotel', function (Blueprint $table) {
            $table->increments('hotel_id');
            $table->string('hotel_phong');
            $table->string('hotel_tenpet');
            $table->string('hotel_giong');
            $table->string('hotel_thoigiangui');
            $table->string('hotel_tenkhach');
            $table->string('hotel_anh');
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
        Schema::dropIfExists('tbl_hotel');
    }
}

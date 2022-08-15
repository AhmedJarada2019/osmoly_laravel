<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyfatorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyfatoras', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('salakhana')->nullable();
            $table->string('city');
            $table->string('phone_number');
            $table->string('quantity');
            $table->string("quantity_type");
            $table->string('total');
            $table->string('buy_date');
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
        Schema::dropIfExists('buyfatoras');
    }
}

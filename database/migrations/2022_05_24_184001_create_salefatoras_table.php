<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalefatorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salefatoras', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("hazera_name")->nullable();
            $table->string("city");
            $table->string("phone_number");
            $table->string("quantity");
            $table->string("quantity_type");
            $table->string("total");
            $table->string("sale_date");
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
        Schema::dropIfExists('salefatoras');
    }
}

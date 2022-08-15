<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFatorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fatoras', function (Blueprint $table) {
            $table->id();
            $table->string("vendor_id");
            $table->string("hazera_name");
            $table->string("city");
            $table->string("phone_number");
            $table->string("quantity");
            $table->string("buy_price");
            // $table->string("customer_id");
            $table->string("salakhana");
            $table->string("sale_price");
            $table->string("extra_cost");
            $table->string("total_sale");
            $table->string("total_buy");
            $table->string("sale_date");
            $table->string("buy_q_type");
            $table->string("sale_q_type");

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
        Schema::dropIfExists('fatoras');
    }
}

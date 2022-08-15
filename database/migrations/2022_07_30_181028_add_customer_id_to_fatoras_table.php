<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCustomerIdToFatorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fatoras', function (Blueprint $table) {
            // $table->dropColumn('customer_id');
            $table->foreignId('customer_id')->nullable()->constrained('customers')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fatoras', function (Blueprint $table) {
            //
        });
    }
}

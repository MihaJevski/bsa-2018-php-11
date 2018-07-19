<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lots', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('currency_id');
            $table->unsignedInteger('seller_id');
            $table->timestamp('date_time_open')->default(\DB::raw('CURRENT_TIMESTAMP'));;
            $table->timestamp('date_time_close')->default(\DB::raw('CURRENT_TIMESTAMP'));;
            $table->float('price', 8, 2);
            $table->timestamps();

            $table->foreign('currency_id')
                ->references('id')
                ->on('currencies');
            $table->foreign('seller_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lots');
    }
}

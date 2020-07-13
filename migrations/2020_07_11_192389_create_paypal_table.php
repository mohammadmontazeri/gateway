<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZarinpalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paypal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('default_product_name')->default('My Product');
            $table->string('default_shipment_price')->default(0);
            $table->string('clientIid');
            $table->string('secret');
            $table->enum('s_mode',['sandbox','live'])->default('sandbox');
            $table->string('s_connection_timeout')->default(30);
            $table->string('s_log_enable')->default('true');
            $table->string('s_file_name')->default("/logs/paypal.log");
            $table->string('s_callback_url')->default("/gateway/callback/paypal");
            $table->string('s_log_level')->default("FINE");
            $table->timestamps();
        });
        Schema::table('paypal',function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zarinpal');
    }
}

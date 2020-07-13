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
        Schema::create('zarinpal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('merchant_id');
            $table->string('type');
            $table->string('callback_url')->default('/');
            $table->enum('server',['germany','iran'])->default('germany');
            $table->string('email')->default('email@gmail.com');
            $table->string('mobile')->default("09*********");
            $table->text('description')->default("description");
            $table->timestamps();
        });
        Schema::table('zarinpal',function (Blueprint $table){
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

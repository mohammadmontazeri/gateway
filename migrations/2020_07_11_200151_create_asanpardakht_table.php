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
        Schema::create('asanpardakht', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('merchantId')->default(null);
            $table->string('merchantConfigId')->default(null);
            $table->string('callback_url')->default("/");
            $table->string('username')->default(null);
            $table->string('password')->default(null);
            $table->string('key')->default(null);
            $table->string('iv')->default(null);
            $table->timestamps();
        });
        Schema::table('asanpardakht',function (Blueprint $table){
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcriveCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('active_code', function (Blueprint $table) {
            $table -> bigIncrements('id');

            $table -> unsignedBigInteger('user_id');

            $table -> foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('code');

            $table->unique(['user_id','code']);

            $table->timestamp('expire_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('active_code');
    }
}

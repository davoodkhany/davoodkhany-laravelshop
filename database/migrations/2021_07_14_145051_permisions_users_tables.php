<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermisionsUsersTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table){

            $table->id();
            $table->string('name');
            $table->string('label');
            $table->timestamps();

        });


        Schema::create('permission_user', function (Blueprint $table){

            $table->unsignedBigInteger('permission_id');
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->primary(['permission_id','user_id']);

        });


        Schema::create('rules', function (Blueprint $table){

            $table->id();
            $table->string('name');
            $table->string('label');
            $table->timestamps();
        });


        Schema::create('rule_user', function (Blueprint $table){

            $table->unsignedBigInteger('rule_id');
            $table->foreign('rule_id')->references('id')->on('rules')->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->primary(['rule_id', 'user_id']);

        });


        Schema::create('permission_rule', function (Blueprint $table){

            $table->unsignedBigInteger('permission_id');
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');

            $table->unsignedBigInteger('rule_id');
            $table->foreign('rule_id')->references('id')->on('rules')->onDelete('cascade');

            $table->primary(['permission_id','rule_id']);

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::drop('permission_user');

        Schema::drop('rule_user');

        Schema::drop('permission_rule');

        Schema::drop('rules');

        Schema::drop('permissions');



    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFovoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fovorites', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->comment('ユーザID');
            $table->unsignedInteger('tweet_id')->comment('ツイートID');

            $table->unique(['user_id', 'tweet_id']);

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('tweet_id')
                ->references('id')
                ->on('tweets')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fovorites');
    }
}

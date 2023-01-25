<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_interactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            $table->foreignId('comment_id')
                    ->references('id')
                    ->on('comments')
                    ->onDelete('cascade');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('table_users_interaction');
    }
};

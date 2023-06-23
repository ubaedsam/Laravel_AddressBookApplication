<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('group_id')->unsigned();
            $table->string('name');
            $table->text('address');
            $table->string('phone');
            $table->timestamps();
            // Relasi antar tabel (menghubungkan ke dalam tabel users berdasarkan id user nya)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // Relasi antar tabel (menghubungkan ke dalam tabel group berdasarkan id group nya)
            $table->foreign('group_id')->references('id')->on('group')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact');
    }
}
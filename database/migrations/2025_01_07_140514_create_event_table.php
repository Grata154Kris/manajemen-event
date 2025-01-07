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
        Schema::create('event', function (Blueprint $table) {
            $table->id('event_id'); // Primary Key
            $table->string('title'); // Judul event
            $table->longText('description')->nullable(); // Deskripsi event
            $table->string('image')->nullable(); // Gambar event
            $table->date('start_date')->nullable(); // Tanggal mulai
            $table->date('end_date')->nullable(); // Tanggal selesai
            $table->unsignedBigInteger('created_by_admin_id'); // Admin yang membuat
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
        Schema::dropIfExists('event');
    }
};

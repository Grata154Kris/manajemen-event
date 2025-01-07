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
        Schema::create('register_event', function (Blueprint $table) {
            $table->id('register_event_id'); // Primary Key
            $table->unsignedBigInteger('participant_id'); // Foreign Key ke participants
            $table->unsignedBigInteger('event_id'); // Foreign Key ke events
            $table->enum('registration', ['pending', 'approved', 'rejected'])->default('pending'); // Status pendaftaran
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
        Schema::dropIfExists('register_event');
    }
};

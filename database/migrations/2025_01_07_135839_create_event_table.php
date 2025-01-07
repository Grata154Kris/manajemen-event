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
            $table->string('title'); // Title column
            $table->longText('description')->nullable(); // Description column
            $table->string('image')->nullable(); // Image column
            $table->date('start_date')->nullable(); // Start Date column
            $table->date('end_date')->nullable(); // End Date column
            $table->unsignedBigInteger('created_by_admin_id')->nullable(); // Admin ID column
            $table->timestamps();

            // Optional: Add foreign key constraint
            $table->foreign('created_by_admin_id')->references('id')->on('admins')->onDelete('cascade');
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

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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("ticket_id");
            $table->foreign("ticket_id")->references("id")->on("tickets")->onDelete("CASCADE")->onUpdate("CASCADE");
            $table->unsignedBigInteger("customer_id");
            $table->foreign("customer_id")->references("id")->on("customers");
            $table->unsignedBigInteger("hotel_id")->nullable();
            $table->foreign("hotel_id")->references("id")->on("hotels")->onDelete("SET NULL");
            $table->date("book_date");
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
        Schema::dropIfExists('bookings');
    }
};

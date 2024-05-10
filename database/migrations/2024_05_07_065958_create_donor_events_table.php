<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonorEventsTable extends Migration
{
    public function up()
    {
        Schema::create('donor_events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('date'); 
            $table->time('event_time');
            $table->string('location');
            $table->unsignedBigInteger('blood_bank_event_id')->nullable();
            $table->foreign('blood_bank_event_id')->references('id')->on('blood_bank_events')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('donor_events');
    }
}

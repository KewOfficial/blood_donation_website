<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donor_id')->nullable();  // Add this line
            $table->unsignedBigInteger('blood_bank_donor_id')->nullable();
            $table->unsignedBigInteger('blood_bank_event_id');
            $table->timestamp('donation_date');
            $table->timestamps();

            $table->foreign('donor_id')->references('id')->on('donors')->onDelete('cascade');  // Add this line
            $table->foreign('blood_bank_donor_id')->references('id')->on('blood_bank_donors')->onDelete('cascade');
            $table->foreign('blood_bank_event_id')->references('id')->on('blood_bank_events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donations');
    }
}

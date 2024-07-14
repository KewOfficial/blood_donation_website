<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('blood_requests', function (Blueprint $table) {
            $table->id();
            $table->string('blood_type');
            $table->integer('quantity');
            $table->string('urgency');
            $table->string('status')->default('pending'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blood_requests');
    }
}

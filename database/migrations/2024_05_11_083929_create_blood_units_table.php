<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodUnitsTable extends Migration
{
    public function up()
    {
        Schema::create('blood_units', function (Blueprint $table) {
            $table->id();
            $table->string('blood_type');
            $table->string('rh_factor');
            $table->integer('units');
            $table->date('expiry_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blood_units');
    }
}

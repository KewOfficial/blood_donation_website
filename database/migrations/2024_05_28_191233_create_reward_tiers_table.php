<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRewardTiersTable extends Migration
{
    public function up()
    {
        Schema::create('reward_tiers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('criteria');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reward_tiers');
    }
}

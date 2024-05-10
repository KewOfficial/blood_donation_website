<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEarningPerformancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('earning_performances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donor_id')->index();
            $table->decimal('total_earned_this_month', 10, 2)->default(0);
            $table->decimal('year_to_date_earnings', 10, 2)->default(0);
            $table->decimal('average_earnings_per_donation', 10, 2)->default(0);
            $table->timestamps();

            $table->foreign('donor_id')->references('id')->on('donors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('earning_performances');
    }
}

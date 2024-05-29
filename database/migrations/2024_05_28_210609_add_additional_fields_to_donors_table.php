<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalFieldsToDonorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    if (!Schema::hasColumn('donors', 'unique_id')) {
        Schema::table('donors', function (Blueprint $table) {
            $table->string('unique_id')->unique();
        });
    }

    if (!Schema::hasColumn('donors', 'total_points')) {
        Schema::table('donors', function (Blueprint $table) {
            $table->integer('total_points')->default(0);
        });
    }

    if (!Schema::hasColumn('donors', 'donation_count')) {
        Schema::table('donors', function (Blueprint $table) {
            $table->integer('donation_count')->default(0);
        });
    }

    if (!Schema::hasColumn('donors', 'status')) {
        Schema::table('donors', function (Blueprint $table) {
            $table->string('status');
        });
    }

    if (!Schema::hasColumn('donors', 'reward_tier_id')) {
        Schema::table('donors', function (Blueprint $table) {
            $table->foreignId('reward_tier_id')->nullable()->constrained('reward_tiers')->onDelete('set null');
        });
    }
}
}
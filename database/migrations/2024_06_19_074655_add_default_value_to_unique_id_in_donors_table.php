<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddDefaultValueToUniqueIdInDonorsTable extends Migration
{
    public function up()
    {
        Schema::table('donors', function (Blueprint $table) {
           
            $table->uuid('unique_id')->default(DB::raw('(UUID())'))->change();
        });
    }

    public function down()
    {
        Schema::table('donors', function (Blueprint $table) {
            
            $table->uuid('unique_id')->change();
        });
    }
}

<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthCheckupVouchersTable extends Migration
{
    public function up()
    {
        Schema::create('health_checkup_vouchers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donor_id')->constrained()->onDelete('cascade');
            $table->string('voucher_code')->unique();
            $table->integer('discount')->default(0); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('health_checkup_vouchers');
    }
}

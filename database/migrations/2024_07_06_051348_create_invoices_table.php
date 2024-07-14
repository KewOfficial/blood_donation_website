<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique();
            $table->decimal('total_amount', 10, 2);
            $table->foreignId('hospital_id')
                  ->constrained('hospitals') 
                  ->onDelete('cascade');  
            
            
            $table->foreignId('blood_request_id')
                  ->constrained('blood_requests') 
                  ->onDelete('cascade');          
            
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}

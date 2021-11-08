<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactMayorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_mayors', function (Blueprint $table) {
            $table->id();
            $table->string('mayor_name')->nullable();    
            $table->string('contact')->nullable();       
            $table->string('email')->nullable();         
            $table->string('father')->nullable();        
            $table->string('mother')->nullable();        
            $table->string('date_birth')->nullable();    
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('nationality')->nullable();  
            $table->string('religion')->nullable();     
            $table->string('gender')->nullable();       
            $table->string('marital_status')->nullable();
            $table->string('latest_degree')->nullable();
            $table->string('blood_group')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->foreignId('created_by')->references('id')->on('users');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_mayors');
    }
}

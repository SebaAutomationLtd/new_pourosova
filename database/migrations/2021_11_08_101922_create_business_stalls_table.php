<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessStallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_stalls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('business_holding_id')->index();
            $table->string('stall_no')->nullable();
            $table->string('ownership')->nullable();
            $table->string('stall_nid')->nullable();
            $table->string('stall_date')->nullable();
            $table->string('stall_phone')->nullable();
            $table->string('stall_rent')->nullable();
            $table->string('stall_tax')->nullable();
            $table->unsignedBigInteger('activated_by')->index()->nullable();
            $table->unsignedBigInteger('deactivated_by')->index()->nullable();
            $table->timestamp('activated_at')->nullable();
            $table->timestamp('deactivated_at')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

            $table->foreign('business_holding_id')->references('id')
                ->on('business_holdings')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('activated_by')->references('id')
                ->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('deactivated_by')->references('id')
                ->on('users')->onDelete('cascade')->onUpdate('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_stalls');
    }
}

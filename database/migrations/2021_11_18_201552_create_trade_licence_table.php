<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradeLicenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trade_licence', function (Blueprint $table) {
            $table->id();
            $table->integer('sonod_apply_id')->nullable();
            $table->string('business_name')->nullable();
            $table->integer('business_type_id')->nullable();
            $table->string('mobile')->nullable();
            $table->string('ward_id')->nullable();
            $table->string('road_moholla')->nullable();
            $table->text('permanent_address')->nullable();
            $table->text('current_address')->nullable();
            $table->string('photo')->nullable();
           $table->tinyInteger('status')->default(0);
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->timestamp('approved_date')->nullable();
            $table->unsignedBigInteger('applied_by')->nullable();
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
        Schema::dropIfExists('trade_licence');
    }
}

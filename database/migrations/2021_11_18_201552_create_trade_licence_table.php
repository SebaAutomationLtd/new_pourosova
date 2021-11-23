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
            $table->unsignedBigInteger('sonod_apply_id')->index();
            $table->string('business_name')->nullable();
            $table->integer('business_type_id')->nullable();
            $table->string('mobile')->nullable();
            $table->string('ward_id')->nullable();
            $table->string('road_moholla')->nullable();
            $table->text('permanent_address')->nullable();
            $table->text('current_address')->nullable();
            $table->string('photo')->nullable();
           $table->tinyInteger('status')->default(0);
            $table->unsignedBigInteger('approved_by')->index()->nullable();
            $table->timestamp('approved_date')->nullable();
            $table->unsignedBigInteger('applied_by')->index()->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

            $table->foreign('sonod_apply_id')->references('id')
                ->on('sonod_apply')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('approved_by')->references('id')
                ->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('applied_by')->references('id')
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
        Schema::dropIfExists('trade_licence');
    }
}

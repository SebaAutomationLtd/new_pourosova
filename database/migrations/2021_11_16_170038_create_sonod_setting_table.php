<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSonodSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sonod_setting', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('desc')->nullable();
            $table->text('endline')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->unsignedBigInteger('activated_by')->nullable();
            $table->unsignedBigInteger('deactivated_by')->nullable();
            $table->timestamp('activated_at')->nullable();
            $table->timestamp('deactivated_at')->nullable();
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
        Schema::dropIfExists('sonod_setting');
    }
}

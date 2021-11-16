<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSonodApplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sonod_apply', function (Blueprint $table) {
            $table->id();
            $table->integer('sonod_setting_id')->nullable();
            $table->string('sonod_no')->nullable();
            $table->string('name')->nullable();
            $table->string('father')->nullable();
            $table->string('husband')->nullable();
            $table->string('mother')->nullable();
            $table->string('nid')->nullable();
            $table->string('birth_certificate')->nullable();
            $table->date('dob')->nullable();
            $table->date('dod')->nullable();
            $table->text('address')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->timestamp('approved_date')->nullable();
            $table->timestamp('applied_by')->nullable();
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
        Schema::dropIfExists('sonod_apply');
    }
}

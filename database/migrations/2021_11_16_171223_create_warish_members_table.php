<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarishMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warish_members', function (Blueprint $table) {
            $table->id();
            $table->integer('sonod_apply_id')->nullable();
            $table->string('name')->nullable();
            $table->string('relation')->nullable();
            $table->string('nid')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('warish_members');
    }
}

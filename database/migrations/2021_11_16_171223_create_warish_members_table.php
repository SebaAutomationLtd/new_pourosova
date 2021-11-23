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
            $table->unsignedBigInteger('sonod_apply_id')->index();
            $table->string('name')->nullable();
            $table->string('relation')->nullable();
            $table->string('nid')->nullable();
            $table->string('remarks')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->unsignedBigInteger('activated_by')->index()->nullable();
            $table->unsignedBigInteger('deactivated_by')->index()->nullable();
            $table->timestamp('activated_at')->nullable();
            $table->timestamp('deactivated_at')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

            $table->foreign('sonod_apply_id')->references('id')
                ->on('sonod_apply')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('warish_members');
    }
}

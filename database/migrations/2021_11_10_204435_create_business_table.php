<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('father')->nullable();
            $table->string('mother')->nullable();
            $table->string('spouse')->nullable();
            $table->string('nid')->nullable();
            $table->string('birth_certificate')->nullable();
             $table->string('mobile')->nullable();
            $table->string('photo')->nullable();
            $table->string('road_moholla')->nullable();
            $table->string('holding_no')->nullable();
            $table->string('shopno')->nullable();
            $table->string('business_name')->nullable();
            $table->text('business_address')->nullable();
            $table->text('current_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->foreignId('ward_id')->nullable();
            $table->foreignId('village_id')->nullable();
            $table->foreignId('business_type_id')->nullable();
            $table->foreignId('payment_method_id')->nullable();
            $table->unsignedFloat('trade_fee')->nullable();
            $table->unsignedFloat('vat')->nullable();
            $table->unsignedFloat('signboard_tax')->nullable();
            $table->unsignedFloat('business_tax')->nullable();
            $table->unsignedFloat('other_tax')->nullable();
            $table->unsignedFloat('trade_total')->nullable();
            $table->unsignedFloat('service_charge')->nullable();
            $table->year('last_license_issue_year')->nullable();
            $table->unsignedBigInteger('activated_by')->nullable();
            $table->unsignedBigInteger('deactivated_by')->nullable();
            $table->timestamp('activated_at')->nullable();
            $table->timestamp('deactivated_at')->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('business');
    }
}

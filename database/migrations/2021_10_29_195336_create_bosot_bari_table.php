<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBosotBariTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bosot_bari', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('father')->nullable();
            $table->string('mother')->nullable();
            $table->string('spouse')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('mobile')->nullable();
            $table->date('dob')->nullable();
            $table->string('nid')->nullable();
            $table->string('birth_certificate')->nullable();
            $table->string('religion')->nullable();
            $table->string('photo')->nullable();
            $table->foreignId('family_class_id')->nullable();
            $table->foreignId('ward_id')->nullable();
            $table->foreignId('village_id')->nullable();
            $table->foreignId('post_office_id')->nullable();
            $table->foreignId('house_type_id')->nullable();
            $table->foreignId('occupation_id')->nullable();
            $table->foreignId('payment_method_id')->nullable();
            $table->foreignId('sanitation_id')->nullable();
            $table->string('holding_no')->nullable();
            $table->unsignedInteger('total_room')->nullable();
            $table->unsignedFloat('height')->nullable();
            $table->unsignedFloat('width')->nullable();
            $table->unsignedInteger('total_male')->nullable();
            $table->unsignedInteger('total_female')->nullable();
            $table->unsignedFloat('monthly_income')->nullable();
            $table->unsignedFloat('yearly_value')->nullable();
            $table->unsignedFloat('yearly_vat')->nullable();
            $table->unsignedFloat('service_charge')->nullable();
            $table->date('last_tax_year')->nullable();
            $table->unsignedBigInteger('activated_by')->nullable();
            $table->unsignedBigInteger('deactivated_by')->nullable();
            $table->timestamp('activated_at')->nullable();
            $table->timestamp('deactivated_at')->nullable();
            $table->tinyInteger('biddut')->default(0);
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
        Schema::dropIfExists('bosot_bari');
    }
}

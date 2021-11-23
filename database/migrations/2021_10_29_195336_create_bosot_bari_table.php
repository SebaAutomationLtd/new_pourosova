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
            $table->unsignedBigInteger('user_id')->index()->nullable();
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
            $table->unsignedBigInteger('family_class_id')->index()->nullable();
            $table->unsignedBigInteger('ward_id')->index()->nullable();
            $table->unsignedBigInteger('village_id')->index()->nullable();
            $table->unsignedBigInteger('post_office_id')->index()->nullable();
            $table->unsignedBigInteger('house_type_id')->index()->nullable();
            $table->unsignedBigInteger('occupation_id')->index()->nullable();
            $table->unsignedBigInteger('payment_method_id')->index()->nullable();
            $table->unsignedBigInteger('sanitation_id')->index()->nullable();
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
            $table->year('last_tax_year')->nullable();
            $table->unsignedBigInteger('activated_by')->nullable();
            $table->unsignedBigInteger('deactivated_by')->nullable();
            $table->timestamp('activated_at')->nullable();
            $table->timestamp('deactivated_at')->nullable();
            $table->tinyInteger('biddut')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ward_id')->references('id')
                ->on('wards')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('village_id')->references('id')
                ->on('villages')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('post_office_id')->references('id')
                ->on('post_offices')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('family_class_id')->references('id')
                ->on('common_settings')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('house_type_id')->references('id')
                ->on('common_settings')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('occupation_id')->references('id')
                ->on('common_settings')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('payment_method_id')->references('id')
                ->on('common_settings')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sanitation_id')->references('id')
                ->on('common_settings')->onDelete('cascade')->onUpdate('cascade');

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

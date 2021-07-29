<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('customer_id');
            $table->integer('customer_ref_id');
            $table->string('customer_type');//General, Distributer, Reseller
            $table->string('customer_name')->unique();
            $table->string('customer_shop_name')->nullable();
            $table->text('customer_shop_info')->nullable();
            $table->string('customer_email')->unique()->nullable();
            $table->string('customer_alternate_email')->unique()->nullable();
            $table->string('customer_cnic_number')->nullable();
            $table->string('customer_town')->nullable();
            $table->string('customer_area')->nullable();
            $table->string('customer_shop_address');
            $table->string('customer_resident_address');
            $table->string('customer_zipcode')->nullable();
            $table->integer('customer_phone_number')->unique()->nullable();
            $table->integer('customer_office_number')->unique()->nullable();
            $table->integer('customer_alternate_number')->nullable();
            // $table->string('customer_image')->nullable();
            // $table->string('customer_website')->nullable();
            // $table->string('customer_company_industry')->nullable();
            // $table->decimal('customer_total_balance', 10, 2)->nullable();
            $table->decimal('customer_balance_paid', 10, 2)->nullable();
            $table->decimal('customer_balance_dues', 10, 2)->nullable();
            $table->decimal('customer_credit_duration', 8, 2)->nullable();
            $table->string('customer_credit_type')->nullable();
            $table->integer('customer_credit_limit')->nullable();
            $table->integer('customer_cash_credit_rate')->nullable();
            // $table->integer('warehouse_id')->nullable();
            $table->integer('status_id');
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}

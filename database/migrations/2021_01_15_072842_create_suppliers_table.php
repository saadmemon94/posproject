<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('supplier_id');
            $table->integer('supplier_ref_id');
            $table->string('supplier_type')->nullable();//General,Distributer
            $table->string('supplier_name')->unique();
            $table->string('supplier_shop_name')->nullable();
            $table->text('supplier_shop_info')->nullable();
            $table->string('supplier_email')->unique()->nullable();
            $table->string('supplier_alternate_email')->unique()->nullable();
            $table->string('supplier_cnic_number')->nullable();
            $table->string('supplier_town')->nullable();
            $table->string('supplier_area')->nullable();
            $table->string('supplier_shipping_address');
            $table->string('supplier_zipcode')->nullable();
            $table->integer('supplier_phone_number')->unique()->nullable();
            $table->integer('supplier_office_number')->unique()->nullable();
            $table->integer('supplier_alternate_number')->nullable();
            // $table->string('supplier_image')->nullable();
            // $table->string('supplier_website')->nullable();
            // $table->string('supplier_company_industry')->nullable();
            // $table->decimal('supplier_total_balance', 10, 2)->nullable();
            $table->decimal('supplier_balance_paid', 10, 2)->nullable();
            $table->decimal('supplier_balance_dues', 10, 2)->nullable();
            $table->decimal('supplier_credit_number', 8, 2)->nullable();
            $table->string('supplier_credit_limit')->nullable();
            $table->integer('supplier_cash_credit_rate')->nullable();
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
        Schema::dropIfExists('suppliers');
    }
}

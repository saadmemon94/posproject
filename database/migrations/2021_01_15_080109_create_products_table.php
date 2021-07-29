<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->string('product_ref_id');
            $table->string('product_type')->nullable();//single,variable or standard,digital,combo
            $table->string('product_name')->unique();
            $table->integer('product_barcode');
            $table->string('product_barcode_type')->nullable();//C128, C39, EAN-13, EAN-8, UPC-A, UPC-E, ITF-14
            $table->string('product_company_id')->nullable();
            $table->string('product_category_id')->nullable();
            $table->string('product_subcategory_id')->nullable();
            $table->string('product_brand_id')->nullable();
            $table->string('product_unit')->nullable();//unit,packet,carton
            $table->integer('product_piece_per_packet')->nullable();
            $table->integer('product_packet_per_carton')->nullable();
            $table->integer('product_piece_per_carton')->nullable();
            $table->integer('product_total_quantity');
            $table->integer('product_quantity_available');
            $table->integer('product_quantity_damage');
            $table->integer('product_trade_price');
            $table->integer('product_credit_retail_price');
            $table->integer('product_cash_retail_price');
            $table->integer('product_non_bulk_price');
            $table->integer('product_alert_quantity')->nullable();
            $table->string('product_state');//damage,faulty,etc
            $table->date('product_expiry_date')->nullable();
            $table->string('product_image')->nullable();
            $table->text('product_info')->nullable();
            // $table->string('product_slug')->nullable();
            $table->integer('warehouse_id')->nullable();
            $table->integer('status_id');//active,inactive
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
        Schema::dropIfExists('products');
    }
}

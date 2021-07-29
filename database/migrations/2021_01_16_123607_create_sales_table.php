<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('sale_id');
            $table->integer('sale_ref_id');
            $table->integer('sale_customer_id');
            // $table->integer('brand_ref_id');
            // $table->integer('company_product_id');
            $table->integer('sale_product_ref_id');
            $table->integer('sale_product_barcode')->nullable();
            $table->string('sale_product_info');
            $table->string('sale_product_unit')->nullable();//packet,carton
            $table->decimal('sale_unit_price', 10, 2);
            $table->integer('sale_product_quantity');
            $table->integer('sale_free_piece')->nullable();
            $table->string('sale_status');//completed/pending  final,draft,quotation,
            $table->text('sale_note')->nullable();
            $table->date('sale_date')->nullable();
            $table->decimal('sale_total_price', 10, 2);
            $table->decimal('sale_discount', 10, 2)->nullable();
            $table->decimal('sale_add_amount', 10, 2)->nullable();
            $table->decimal('sale_grandtotal_price', 10, 2);
            $table->decimal('sale_amount_paid', 10, 2);
            $table->decimal('sale_amount_dues', 10, 2);
            $table->string('sale_payment_method');//cash,credit
            $table->string('sale_payment_status');//paid,due,partial,overdue
            // $table->text('sale_payment_note')->nullable();
            $table->integer('sale_invoice_id')->nullable();
            $table->date('sale_invoice_date')->nullable();
            $table->decimal('sale_payterm_duration', 8, 2)->nullable();
            $table->string('sale_payterm_type')->nullable();
            $table->string('sale_document')->nullable();
            $table->integer('sale_added_by');
            // $table->integer('sale_transaction_id');
            $table->integer('warehouse_id')->nullable();
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
        Schema::dropIfExists('sales');
    }
}

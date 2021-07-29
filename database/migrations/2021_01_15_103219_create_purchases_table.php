<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('purchase_id');
            $table->integer('purchase_ref_id');
            $table->integer('purchase_supplier_id');
            $table->integer('purchase_product_ref_id');
            $table->integer('purchase_product_barcode')->nullable();
            $table->string('purchase_product_info');
            $table->string('purchase_product_unit')->nullable();//packet,carton
            $table->decimal('purchase_unit_price', 10, 2);
            $table->integer('purchase_product_quantity');
            $table->integer('purchase_free_piece')->nullable();
            $table->string('purchase_status');//received,partial,pending,ordered
            $table->text('purchase_note')->nullable();
            $table->date('purchase_date')->nullable();
            $table->decimal('purchase_total_price', 10, 2);
            $table->decimal('purchase_discount', 10, 2)->nullable();
            $table->decimal('purchase_add_amount', 10, 2)->nullable();
            $table->decimal('purchase_grandtotal_price', 10, 2);
            $table->decimal('purchase_amount_paid', 10, 2);
            $table->decimal('purchase_amount_dues', 10, 2);
            $table->string('purchase_payment_method');//cash,credit
            $table->string('purchase_payment_status');//paid,due,partial,overdue
            // $table->text('purchase_payment_note')->nullable();
            $table->integer('purchase_invoice_id')->nullable();
            $table->date('purchase_invoice_date')->nullable();
            $table->decimal('purchase_payterm_number', 8, 2)->nullable();
            $table->string('purchase_payterm_duration')->nullable();
            $table->string('purchase_document')->nullable();
            $table->integer('purchase_added_by');
            // $table->integer('purchase_transaction_id');
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
        Schema::dropIfExists('purchases');
    }
}

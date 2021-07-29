<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('account_id');
            $table->integer('account_ref_id');
            $table->integer('account_customer_id');
            $table->integer('account_supplier_id');
            $table->string('account_name');
            $table->string('account_status');//active,inactive, default,
            $table->text('account_note')->nullable();
            // $table->date('account_date')->nullable();
            $table->string('account_type');//debit,credit
            $table->string('account_payment_type');//sale,purchase
            $table->string('account_payment_method');//cash,credit,deposit
            $table->string('account_payment_status');//paid,due,partial,overdue
            $table->decimal('account_initial_balance', 10, 2);
            $table->decimal('account_total_amount', 10, 2);
            $table->decimal('account_amount_paid', 10, 2);
            $table->decimal('account_amount_dues', 10, 2);
            $table->integer('account_user_id');
            // $table->integer('account_created_by');
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
        Schema::dropIfExists('accounts');
    }
}

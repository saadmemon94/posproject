<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->bigIncrements('brand_id');
            $table->integer('brand_ref_id');
            $table->string('parent_company')->nullable();
            // $table->string('brand_type')->nullable();
            $table->string('brand_name')->unique();
            // $table->string('brand_image')->nullable();
            $table->text('brand_info')->nullable();
            // $table->string('brand_slug')->nullable();
            $table->integer('status_id');
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
        Schema::dropIfExists('brands');
    }
}

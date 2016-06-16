<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('merchant_id')->index();
            $table->integer('link_id')->index();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('coupon_id')->nullable();
            $table->string('coupon_code')->nullable();
            $table->string('network')->nullable();
            $table->string('affiliate_url')->nullable();
            $table->string('direct_url')->nullable();
            $table->string('skim_link_url')->nullable();
            $table->string('fmtc_url')->nullable();
            $table->float('sale_price')->default(0.00);
            $table->float('old_price')->default(0.00);
            $table->float('discount')->default(0.00);
            $table->float('precentage')->default(0.00);
            $table->float('threshold')->default(0.00);
            $table->float('rating')->default(0.00);
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->dateTime('last_update');
            $table->dateTime('last_created');
            $table->timestamps();

            $table->index(['merchant_id', 'link_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}

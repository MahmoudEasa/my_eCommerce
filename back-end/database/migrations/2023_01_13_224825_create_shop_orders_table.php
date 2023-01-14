<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_no');
            $table->timestamp('order_date')->useCurrent();
            $table->integer('order_total');

            $table->foreignId('user_id')
                ->constrained('site_users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate()
            ;
            $table->foreignId('payment_method_id')
                ->constrained('user_payment_methods')
                ->cascadeOnDelete()
                ->cascadeOnUpdate()
            ;
            $table->foreignId('shipping_address')
                ->constrained('addresses')
                ->cascadeOnDelete()
                ->cascadeOnUpdate()
            ;
            $table->foreignId('shipping_method')
                ->constrained('shipping_methods')
                ->cascadeOnDelete()
                ->cascadeOnUpdate()
            ;
            $table->foreignId('order_status')
                ->constrained('order_statuses')
                ->cascadeOnDelete()
                ->cascadeOnUpdate()
            ;
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
        Schema::dropIfExists('shop_orders');
    }
};
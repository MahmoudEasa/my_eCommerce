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
        Schema::create('user_order_reviews', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('rating_value');
            $table->text('comment');

            $table->foreignId('user_id')
                ->constrained('site_users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate()
            ;
            $table->foreignId('ordered_product_id')
                ->constrained('order_lines')
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
        Schema::dropIfExists('user_order_reviews');
    }
};
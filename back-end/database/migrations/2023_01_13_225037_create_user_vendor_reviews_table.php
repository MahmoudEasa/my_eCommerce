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
        Schema::create('user_vendor_reviews', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('rating_value');
            $table->text('comment');

            $table->foreignId('user_id')
                ->constrained('site_users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate()
            ;
            $table->foreignId('vendor_id')
                ->constrained('vendors')
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
        Schema::dropIfExists('user_vendor_reviews');
    }
};
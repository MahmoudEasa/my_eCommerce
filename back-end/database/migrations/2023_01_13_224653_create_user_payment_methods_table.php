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
        Schema::create('user_payment_methods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('site_users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate()
            ;
            $table->foreignId('payment_type_id')
                ->constrained('payment_types')
                ->cascadeOnDelete()
                ->cascadeOnUpdate()
            ;
            $table->string('provider');
            $table->string('account_number')->unique();
            $table->timestamp('expire_date');
            $table->boolean('is_default')->default(0);
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
        Schema::dropIfExists('user_payment_methods');
    }
};
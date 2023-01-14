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
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_default')->default(0);

            $table->foreignId('user_id')
                ->constrained('site_users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate()
            ;
            $table->foreignId('address_id')
                ->constrained('addresses')
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
        Schema::dropIfExists('user_addresses');
    }
};
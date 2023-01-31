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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('source_id');
            $table->string('order_number');
            $table->foreignId('client_id');
            $table->string('delivery_type');
            // $table->enum('delivery_type', ['StopDesk', 'Domicile']);
            $table->string('Note');
            $table->foreignId('delivery_company_id');
            $table->foreignId('EditedBy');
            $table->boolean('isSent');
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
        Schema::dropIfExists('orders');
    }
};

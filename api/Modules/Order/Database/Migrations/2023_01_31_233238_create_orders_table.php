<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('source_id')->nullable();
            $table->string('order_number')->nullable();
            $table->foreignId('cusomter_id')->nullable();
            $table->foreignId('store_id');
            $table->string('delivery_type')->nullable();
            $table->string('note')->nullable();
            $table->foreignId('delivery_company_id')->nullable();
            $table->foreignId('status_order_id')->nullable();
            $table->foreignId('edited_by')->nullable();
            $table->boolean('is_sent')->nullable();
            $table->decimal('order_total', 8, 2)->default(0);
            $table->timestamps();
            $table->softDeletes();
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

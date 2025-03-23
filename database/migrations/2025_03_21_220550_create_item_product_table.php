<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('item_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_type_id'); // Foreign key to product types
            $table->string('serial_number')->unique();
            $table->boolean('sold')->default(false);
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('product_type_id')->references('id')->on('product_types')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('item_product');
    }
};

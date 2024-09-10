<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200);
            $table->string('short_des', 500);
            $table->boolean('discount');
            $table->string('discount_price');
            $table->string('image', 200);
            $table->boolean('stock');
            $table->string('price', 50);
            $table->string('star', 50);
            $table->enum('remark', ['popular', 'new', 'top', 'special', 'trending', 'regular']);

            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('category_id');

            $table->foreign('brand_id')->references('id')->on('brands')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

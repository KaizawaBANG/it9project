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
            $table->bigIncrements('product_id');
            $table->string('name');
            $table->decimal('price', 10, 2)->unsigned()->default(0);
            $table->integer('quantity')->unsigned()->default(0); 
            $table->string('barcode', 12)->unique();
            
            
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('category_id')->on('categories')
                ->onUpdate('cascade') 
                ->onDelete('set null'); 
            
            $table->timestamps(); 
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

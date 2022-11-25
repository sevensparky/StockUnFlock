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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')->constrained()->cascadeOnDelete();
            $table->foreignId('customer_id')->constrained()->cascadeOnDelete();
            // $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            // $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('invoice_no')->unique();
            $table->string('slug');
            // $table->integer('selling_quantity')->nullable();
            // $table->integer('unit_price')->nullable();
            // $table->integer('selling_price')->nullable();
            // $table->integer('total_sum')->nullable();
            // $table->integer('date')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['pending', 'approved'])->default('pending')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            // $table->unsignedBigInteger('updated_by')->nullable();
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
        Schema::dropIfExists('invoices');
    }
};

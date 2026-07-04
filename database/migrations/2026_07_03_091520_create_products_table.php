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

            // Product
            $table->string('product_name');

            // Foreign Key
            $table->foreignId('category_id')
                ->constrained('categories')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('department_id')
                ->constrained('departments')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('location_id')
                ->constrained('locations')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            // Stock
            $table->unsignedInteger('stock')->default(0);

            // Condition
            $table->enum('product_condition', [
                'Good',
                'Minor Damage',
                'Damaged',
            ]);

            // Status
            $table->enum('product_status', [
                'Available',
                'Borrowed',
                'Maintenance',
            ])->default('Available');

            // Description
            $table->text('product_description')->nullable();

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

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
        Schema::create('borrowings', function (Blueprint $table) {
            $table->id();

            // Staff yang menginput transaksi
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            // Data peminjam
            $table->string('borrower_name', 100);
            $table->string('borrower_phone', 20)->nullable();
            $table->string('borrower_email', 100)->nullable();

            // Informasi peminjaman
            $table->date('borrow_date');
            $table->date('return_date')->nullable();
            $table->date('actual_return_date')->nullable();

            // Status transaksi
            $table->enum('borrowing_status', [
                'Borrowed',
                'Returned',
                'Late'
            ])->default('Borrowed');

            // Catatan
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowings');
    }
};

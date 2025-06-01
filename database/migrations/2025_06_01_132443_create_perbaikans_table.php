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
        Schema::create('perbaikans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id')->constrained('barangs');
            $table->foreignId('petugas_id')->constrained('petugas');
            $table->date('tanggal_lapor');
            $table->text('kerusakan');
            $table->enum('status', ['Dilaporkan', 'Dalam Perbaikan', 'Selesai'])->default('Dilaporkan');
            $table->text('tindakan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perbaikans');
    }
};

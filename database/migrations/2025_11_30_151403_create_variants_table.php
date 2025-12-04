<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('variants', function (Blueprint $table) {
            $table->id();
            // INI KABEL PENGHUBUNGNYA (Foreign Key)
            // 'product_id' artinya tabel ini milik tabel 'products'
            // constrained() = menjaga agar id harus valid
            // onDelete('cascade') = kalau Product dihapus, Variant ikut terhapus otomatis
            $table->foreignId('product_id')->constrained()->onDelete('cascade');

            $table->string('nama_varian'); // misal: "Merah XL"
            $table->integer('harga_tambahan')->default(0);
            $table->integer('stok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variants');
    }
};

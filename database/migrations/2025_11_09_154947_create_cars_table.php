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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade');
            $table->string('model');
            $table->string('slug')->unique();
            $table->integer('year');
            $table->unsignedBigInteger('price');
            $table->string('condition'); // 'Baru' / 'Bekas'
            $table->string('transmission'); // 'Manual' / 'Otomatis'
            $table->string('engine_capacity'); // 'ex:1500cc'
            $table->string('mileage'); // '10.000 km' (bisa 0 jika baru)
            $table->string('color');
            $table->text('description');
            $table->string('main_image'); // Foto utama untuk card
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};

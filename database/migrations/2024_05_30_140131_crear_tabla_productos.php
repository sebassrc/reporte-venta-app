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
        Schema::create('productos', function (Blueprint $table) {
         $table->id();
            $table->string('codigo', 9);
            $table->string('nombre', 255);
            $table->integer('precio');
            $table->enum('area', ['linea lubricantes', 'linea accesorios', 'linea aditivos','aceite havoline']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};

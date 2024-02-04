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
        Schema::create('suaras', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_suara_tps');
            $table->timestamps();

            $table->foreignId('caleg_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->foreignId('tps_id')
                ->constrained('pengugutan')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suaras');
    }
};

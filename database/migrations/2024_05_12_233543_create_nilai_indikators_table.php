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
        Schema::create('nilai_indikators', function (Blueprint $table) {
            $table->id();
            $table->foreignid('indikator_id')->references('id')->on('indikators')->onDelete('cascade');
            $table->foreignid('laporan_id')->references('id')->on('laporan_penilaians')->onDelete('cascade');
            $table->json('evidence')->nullable();
            $table->text('penjelasan');
            $table->integer('nilai');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_indikators');
    }
};

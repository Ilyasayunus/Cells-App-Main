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
        Schema::create('indikators', function (Blueprint $table) {
            $table->id();
            $table->foreignid('aspek_id')->references('id')->on('aspek_indikators')->onDelete('cascade');
            $table->foreignid('domain_id')->references('id')->on('domain_indikators')->onDelete('cascade');
            $table->string('nama_indikator');
            $table->text('uraian_indikator');
            $table->text('tujuan_indikator');
            $table->text('ruang_lingkup_indikator');
            $table->text('tingkat_1');
            $table->text('tingkat_2');
            $table->text('tingkat_3');
            $table->text('tingkat_4');
            $table->text('tingkat_5');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('indikators');
    }
};
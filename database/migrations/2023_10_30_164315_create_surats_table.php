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
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->string('namaPengaju');
            $table->string('nik');
            $table->string('detailAjuan');
            $table->string('email');
            $table->string('wa');
            $table->integer('statusSurat')->default(0);
            $table->string('ktpPic');
            $table->string('kategoriSurat')->references('kategoriSurat')->on('kategoris');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};

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
        Schema::create('laporan_monitoring', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tanggal');
            $table->string('shift');
            $table->string('divisi');
            $table->string('perangkat');
            $table->string('area');
            $table->string('jam');
            $table->string('user');
            $table->longText('ttd1');
            $table->longText('ttd2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_monitoring');
    }
};

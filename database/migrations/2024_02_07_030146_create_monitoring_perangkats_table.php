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
        Schema::create('monitoring_perangkat', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idperangkat');
            $table->unsignedInteger('idlaporanmonitoring');
            $table->string('lokasi');
            $table->text('catatan')->nullable();
            $table->text('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monitoring_perangkat');
    }
};

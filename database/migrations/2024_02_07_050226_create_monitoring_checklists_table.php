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
        Schema::create('monitoring_checklists', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('idmonitoring');
            $table->string('checklist');
            $table->enum('status', ['OK', 'NOT OK']);
            $table->integer('idmonitoringperangkat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monitoring_checklists');
    }
};

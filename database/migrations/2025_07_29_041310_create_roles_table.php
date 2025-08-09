<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('rl_id');
            $table->string('rl_name', 50);
            $table->text('rl_description')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('rl_created_by')->nullable();
            $table->unsignedBigInteger('rl_updated_by')->nullable();
        });
    }

    public function down(): void {
        Schema::dropIfExists('roles');
    }
};

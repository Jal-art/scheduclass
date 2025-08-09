<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->bigIncrements('subject_id');
            $table->string('subject_name', 100);
            $table->string('subject_code', 20);
            $table->text('subject_description')->nullable();
            $table->unsignedBigInteger('subject_created_by')->nullable();
            $table->unsignedBigInteger('subject_updated_by')->nullable();
            $table->unsignedBigInteger('subject_deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};

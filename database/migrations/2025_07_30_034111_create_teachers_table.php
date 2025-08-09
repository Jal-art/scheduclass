<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('teacher_id');
            $table->unsignedBigInteger('teacher_subject_id')->nullable();

            $table->unsignedBigInteger('teacher_created_by')->nullable();
            $table->unsignedBigInteger('teacher_updated_by')->nullable();
            $table->unsignedBigInteger('teacher_deleted_by')->nullable();

            $table->timestamps();
            $table->softDeletes();
            

            // foreign key (jika subject_id mengarah ke tabel subjects)
            $table->foreign('teacher_subject_id')->references('subject_id')->on('subjects')->onDelete('set null');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};

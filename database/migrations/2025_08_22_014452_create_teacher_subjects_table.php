<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('teacher_subjects', function (Blueprint $table) {
            $table->id('ts_id');
            $table->unsignedBigInteger('ts_teacher_id');
            $table->unsignedBigInteger('ts_subject_id');
            $table->timestamps();

            $table->foreign('ts_teacher_id')
                  ->references('usr_id')->on('users')
                  ->onDelete('cascade');
            $table->foreign('ts_subject_id')
                  ->references('subject_id')->on('subjects')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teacher_subjects');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('schedules_id');

            $table->unsignedBigInteger('schedule_user_id')->nullable();
            $table->unsignedBigInteger('schedule_subject_id')->nullable();
            $table->unsignedBigInteger('schedule_class_level_id')->nullable();

            $table->string('schedule_day', 10);
            $table->time('schedule_start_time');
            $table->time('schedule_end_time');
            $table->string('schedule_room', 50);

            $table->unsignedBigInteger('schedule_created_by')->nullable();
            $table->unsignedBigInteger('schedule_updated_by')->nullable();
            $table->unsignedBigInteger('schedule_deleted_by')->nullable();

            $table->timestamps();
            $table->softDeletes();


            

            // Foreign Keys (optional, sesuaikan nama tabel yang ada)
            $table->foreign('schedule_user_id')->references('usr_id')->on('users')->onDelete('set null');
            $table->foreign('schedule_subject_id')->references('subject_id')->on('subjects')->onDelete('set null');
            $table->foreign('schedule_class_level_id')->references('class_level_id')->on('class_levels')->onDelete('set null');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};

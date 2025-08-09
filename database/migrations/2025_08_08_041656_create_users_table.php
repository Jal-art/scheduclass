<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('usr_id');
            $table->unsignedBigInteger('usr_role_id');
            $table->string('usr_name', 255);
            $table->string('usr_email', 255)->unique();
            $table->string('usr_password', 255);
            $table->unsignedBigInteger('usr_major_id')->nullable();
            $table->unsignedBigInteger('usr_class_level_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unsignedBigInteger('usr_created_by')->nullable();
            $table->unsignedBigInteger('usr_updated_by')->nullable();
            $table->unsignedBigInteger('usr_deleted_by')->nullable();

            $table->string('usr_sys_note', 255)->nullable();

            // Foreign keys
            $table->foreign('usr_role_id')->references('rl_id')->on('roles')->onDelete('cascade');
            $table->foreign('usr_major_id')->references('major_id')->on('majors')->onDelete('cascade');
            $table->foreign('usr_class_level_id')->references('class_level_id')->on('class_levels')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

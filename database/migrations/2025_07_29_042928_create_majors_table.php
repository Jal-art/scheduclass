<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('majors', function (Blueprint $table) {
            $table->bigIncrements('major_id');

            $table->string('major_name', 100)->unique();
            $table->string('major_code', 20)->nullable()->unique();
            $table->text('major_description')->nullable();

            // Audit fields
            $table->unsignedBigInteger('major_created_by');
            $table->unsignedBigInteger('major_updated_by')->nullable();
            $table->unsignedBigInteger('major_deleted_by')->nullable();

            $table->timestamps();
            $table->softDeletes();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('majors');
    }
};

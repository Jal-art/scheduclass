<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('class_levels', function (Blueprint $table) {
            $table->bigIncrements('class_level_id');

            $table->string('class_level_name', 50)->unique();
            $table->text('class_level_description')->nullable();

            $table->unsignedBigInteger('class_created_by');
            $table->unsignedBigInteger('class_updated_by')->nullable();
            $table->unsignedBigInteger('class_deleted_by')->nullable();

            $table->timestamps();
            $table->softDeletes();
            

            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('class_levels');
    }
};

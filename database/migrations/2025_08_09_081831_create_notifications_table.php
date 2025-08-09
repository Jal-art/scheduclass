<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('notification_id');

            $table->unsignedBigInteger('notification_user_id');
            $table->string('notification_type', 50);
            $table->text('notification_message');
            $table->dateTime('notification_read_at')->nullable();

            $table->unsignedBigInteger('notification_created_by');
            $table->unsignedBigInteger('notification_updated_by')->nullable();
            $table->unsignedBigInteger('notification_deleted_by')->nullable();

            $table->timestamps();
            $table->softDeletes();


            

            // Foreign keys ke tabel users
            $table->foreign('notification_user_id')->references('usr_id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prequalification_minutes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('hse_name');
            $table->string('hse_manager');
            $table->foreignId('prequalification_id')->nullable()->constrained('prequalifications')->onDelete('set null')->onUpdate('cascade');
            $table->integer('score');
            $table->boolean('is_upload_vendor')->default(false);
            $table->boolean('is_upload_manager')->default(false);
            $table->string('document_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prequalification_minutes');
    }
};

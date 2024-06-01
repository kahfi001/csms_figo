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
        Schema::create('user_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prequalification_id')->nullable()->constrained('prequalifications')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('criteria_id')->nullable()->constrained('criterias')->onDelete('set null')->onUpdate('cascade');
            $table->string('response');
            $table->string('information');
            $table->string('attachment_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_responses');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('features', function (Blueprint $table) {
        $table->id();
        $table->foreignId('package_id')->constrained()->onDelete('cascade');
        $table->string('name');
        $table->string('name_ar')->nullable();
        $table->text('description')->nullable();
        $table->text('description_ar')->nullable();
        $table->boolean('daily')->default(false);
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('features');
    }
};

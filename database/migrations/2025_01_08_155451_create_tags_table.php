<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('old_tags', function (Blueprint $table): void {
            $table->uuid('id')->primary();

            $table->json('name');
            $table->json('slug');
            $table->string('type', 125)->nullable();
            $table->integer('order_column')->nullable();

            $table->timestamps();
        });

        Schema::create('taggables', function (Blueprint $table): void {
            $table->foreignUuid('tag_id')->constrained()->cascadeOnDelete();

            $table->uuidMorphs('taggable');

            $table->unique(['tag_id', 'taggable_id', 'taggable_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('taggables');
    }
};

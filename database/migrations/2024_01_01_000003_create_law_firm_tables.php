<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Categories
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        // 2. Posts (Artikel)
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('body');
            $table->string('featured_image')->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->unsignedBigInteger('views_count')->default(0);
            $table->timestamps();
        });

        // 3. Tags & Post_Tag (Pivot Table)
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Schema::create('post_tag', function (Blueprint $table) {
            $table->foreignId('post_id')->constrained()->cascadeOnDelete();
            $table->foreignId('tag_id')->constrained()->cascadeOnDelete();
            $table->primary(['post_id', 'tag_id']);
        });

        // 4. Services (Layanan Hukum)
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('icon')->nullable();
            $table->timestamps();
        });

        // 5. Lawyers (Tim Pengacara)
        Schema::create('lawyers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title'); // e.g. "Managing Partner"
            $table->text('bio');
            $table->string('photo')->nullable();
            $table->string('practice_areas')->nullable();
            $table->timestamps();
        });

        // 6. Consultations
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('category')->nullable();
            $table->text('message');
            $table->enum('status', ['new', 'in_progress', 'resolved'])->default('new');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('consultations');
        Schema::dropIfExists('lawyers');
        Schema::dropIfExists('services');
        Schema::dropIfExists('post_tag');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('categories');
    }
};

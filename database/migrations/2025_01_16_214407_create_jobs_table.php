<?php

use App\Models\Category;
use App\Models\Company;
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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Company::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Category::class)->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->string('experience')->nullable();
            $table->enum('type', ['full-time', 'part-time', 'contract', 'temporary', 'internship', 'volunteer', 'freelance'])->default('full-time');
            $table->string('slug')->unique();
            $table->integer('vacancy')->default(1);
            $table->string('qualification')->nullable();
            $table->string('duration')->nullable();
            $table->string('location');
            $table->string('salary_range');
            $table->string('application_link')->nullable();
            $table->string('application_email');
            $table->string('application_phone');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('expiration_date')->nullable();
            $table->enum('status', ['active', 'inactive', 'expired'])->default('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropForeign(['category_id']);
        });
        Schema::dropIfExists('jobs');
    }
};

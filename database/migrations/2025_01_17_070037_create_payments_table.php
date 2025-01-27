<?php

use App\Models\User;
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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'user_id')->constrained()->onDelete('cascade');
            $table->string('method');
            $table->string('gateway')->nullable();
            $table->string('reference')->nullable();
            $table->string('transaction_code')->nullable();
            $table->enum('status', ['pending', 'paid', 'failed', 'cancelled'])->default('pending');
            $table->double('amount', 8, 2);
            $table->dateTime('paid_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};

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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index()->constrained('users')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->integer('quantity')->default(0);
            $table->string('weight');
            $table->decimal('price',10, 2)->nullable();
            $table->enum('type', ['sale', 'trade', 'both'])->default('sale');
            $table->enum('status', ['available', 'locked', 'sold', 'traded', 'removed'])->default('available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

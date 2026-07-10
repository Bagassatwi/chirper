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
        Schema::create('chirps', function (Blueprint $table) {
            // $table->binary('id', 16)->primary();
            // $table->binary('user_id', 16);
            $table->uuid('id')->primary();
            $table->foreignUuidFor(User::class)->nullable(false)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('message', 255);
            $table->timestamps();
            $table->softDeletes();
            // $table->foreign('user_id')
            //     ->references('id')
            //     ->on('users')
            //     ->cascadeOnDelete()
            //     ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chirps');
    }
};

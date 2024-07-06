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
        Schema::create('net_worth', function(Blueprint $table){
            $table->id();
            $table->foreign('networth_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->decimal('assets', 15, 2);
            $table->decimal('liabilities', 15, 2);
            $table->decimal('current_networth', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('net_worth');
    }
};

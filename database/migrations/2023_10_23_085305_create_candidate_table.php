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
        Schema::create('candidate', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('fname');
            $table->string('lname');
            $table->string('mname')->nullable();
            $table->string('suffix')->nullable();
            $table->tinyInteger('position');
            $table->tinyInteger('election');
            $table->longText('platform');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate');
    }
};

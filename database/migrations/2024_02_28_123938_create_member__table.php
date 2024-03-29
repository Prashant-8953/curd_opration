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
        Schema::create('member_', function (Blueprint $table) {
            $table->id('member_id');
            $table->string('name',255);
            $table->string('email');
            $table->string('contact',11);
            $table->unsignedBigInteger('group_id');
            $table->foreign('group_id')->references('group_id')->on('groups_');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_');
    }
};

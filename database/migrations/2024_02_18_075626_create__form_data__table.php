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
        Schema::create('_form_data_', function (Blueprint $table) {
            $table->id('student_id');
            $table->string('student_name');
            $table->string('email');
            $table->string('password');
            $table->date('DOB');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_form_data_');
    }
};

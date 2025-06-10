<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('timetables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_subject_id');
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('slot_id');
            $table->string('room_number')->nullable(); 
            $table->timestamps();

            
            $table->foreign('class_subject_id')->references('id')->on('class_subjects')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->foreign('slot_id')->references('id')->on('slots')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('timetables');
    }
};

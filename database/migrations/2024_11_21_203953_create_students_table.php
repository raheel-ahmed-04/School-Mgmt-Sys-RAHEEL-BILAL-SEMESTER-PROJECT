<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('roll_number')->unique();
            $table->unsignedBigInteger('class_id');  
            $table->foreign('class_id')->references('id')->on('classnames')->onDelete('cascade');
            $table->date('date_of_birth');
            $table->string('parent_contact');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

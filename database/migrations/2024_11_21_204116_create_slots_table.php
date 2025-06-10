<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('slots', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->string('time_slot');
            $table->timestamps();

        });

        DB::table('slots')->insert([
            ['day'=>'Monday', 'time_slot'=>'08:00am to 09:00am'],
            ['day'=>'Monday', 'time_slot'=>'09:00am to 10:00am'],
            ['day'=>'Monday', 'time_slot'=>'10:00am to 11:00am'],
            ['day'=>'Monday', 'time_slot'=>'11:00am to 12:00pm'],
            ['day'=>'Monday', 'time_slot'=>'12:00pm to 01:00pm'],

            ['day'=>'Tuesday', 'time_slot'=>'08:00am to 09:00am'],
            ['day'=>'Tuesday', 'time_slot'=>'09:00am to 10:00am'],
            ['day'=>'Tuesday', 'time_slot'=>'10:00am to 11:00am'],
            ['day'=>'Tuesday', 'time_slot'=>'11:00am to 12:00pm'],
            ['day'=>'Tuesday', 'time_slot'=>'12:00pm to 01:00pm'],

            ['day'=>'Wednesday', 'time_slot'=>'08:00am to 09:00am'],
            ['day'=>'Wednesday', 'time_slot'=>'09:00am to 10:00am'],
            ['day'=>'Wednesday', 'time_slot'=>'10:00am to 11:00am'],
            ['day'=>'Wednesday', 'time_slot'=>'11:00am to 12:00pm'],
            ['day'=>'Wednesday', 'time_slot'=>'12:00pm to 01:00pm'],

            ['day'=>'Thursday', 'time_slot'=>'08:00am to 09:00am'],
            ['day'=>'Thursday', 'time_slot'=>'09:00am to 10:00am'],
            ['day'=>'Thursday', 'time_slot'=>'10:00am to 11:00am'],
            ['day'=>'Thursday', 'time_slot'=>'11:00am to 12:00pm'],
            ['day'=>'Thursday', 'time_slot'=>'12:00pm to 01:00pm'],

            ['day'=>'Friday', 'time_slot'=>'08:00am to 08:45am'],
            ['day'=>'Friday', 'time_slot'=>'08:45am to 09:30am'],
            ['day'=>'Friday', 'time_slot'=>'09:30am to 10:15am'],
            ['day'=>'Friday', 'time_slot'=>'10:15am to 11:00am'],
            ['day'=>'Friday', 'time_slot'=>'11:00am to 11:45am'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('slots');
    }
};

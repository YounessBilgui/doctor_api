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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->on('users')->references('id')->onDelete('CASCADE');
            $table->string('address');
            $table->dateTime('date_of_birth');
            $table->string('CIN');
            $table->enum('gender',['m', 'f']);
            $table->enum('blood_type',[
            'O-',
            'O+',
            'A+',
            'A-',
            'B+',
            'B-',
            'AB+',
            'AB-'
            ])->nullable();
            $table->string('phone', 10)->unique();
            $table->string('allergies')->nullable();
            $table->string('CNSS_Number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};

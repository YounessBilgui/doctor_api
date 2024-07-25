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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('address');
            $table->string('maladie');
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
            $table->string('status')->default('not_yet');
            $table->string('phone', 10);
            $table->datetime('appointment_date');
            $table->string('allergies')->nullable();
            $table->string('CNSS_Number')->nullable();
            $table->timestamps();
            $table->foreign('patient_id')->on('users')->references('id')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};

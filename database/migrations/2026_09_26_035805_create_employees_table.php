<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            // Nama karyawan
            $table->string('name')->nullable();

            // User bersifat opsional
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            // Department dan Position wajib
            $table->foreignId('department_id')
                ->constrained();

            $table->foreignId('position_id')
                ->constrained();

            $table->string('address')->nullable();

            $table->string('pob')->nullable();

            $table->date('dob')->nullable();

            $table->enum('gender', [
                'male',
                'female',
                'other'
            ])->nullable();

            $table->enum('religion', [
                'islam',
                'christianity',
                'catholic',
                'hindu',
                'buddhist',
                'konghucu'
            ])->nullable();

            $table->string('phone_number')->nullable();

            $table->integer('salary')->nullable();

            $table->date('start_date')->nullable();

            $table->date('end_date')->nullable();

            $table->enum('status', [
                'applicant',
                'active',
                'trainee'
            ])->default('active');

            $table->string('image')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
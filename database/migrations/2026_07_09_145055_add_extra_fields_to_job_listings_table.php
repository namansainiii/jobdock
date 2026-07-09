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
        Schema::table('job_listings', function (Blueprint $table) {
            $table->string('experience_level')->nullable()->after('job_type');      // Entry / Mid / Senior / Lead
            $table->string('education_level')->nullable()->after('experience_level'); // None / HS / Bachelor's / etc.
            $table->string('industry')->nullable()->after('education_level');        // Technology / Finance / etc.
            $table->unsignedInteger('salary_max')->nullable()->after('salary');      // Salary range upper bound
            $table->unsignedInteger('vacancies')->default(1)->after('salary_max');   // Number of open positions
            $table->date('application_deadline')->nullable()->after('vacancies');    // Closing date
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_listings', function (Blueprint $table) {
            $table->dropColumn([
                'experience_level',
                'education_level',
                'industry',
                'salary_max',
                'vacancies',
                'application_deadline',
            ]);
        });
    }
};

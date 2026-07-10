<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('company_about')->nullable();
            $table->text('technologies_used')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();
            $table->text('about_me')->nullable();
            $table->text('skills')->nullable();
            $table->string('education')->nullable();
            $table->boolean('show_phone_to_others')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'company_about',
                'technologies_used',
                'contact_phone',
                'contact_email',
                'about_me',
                'skills',
                'education',
                'show_phone_to_others'
            ]);
        });
    }
};

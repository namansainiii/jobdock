<?php

use App\Models\Job;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

uses(RefreshDatabase::class);

test('job type filter is case-insensitive and handles remote boolean column', function () {
    $user = User::create([
        'name' => 'Test Company',
        'email' => 'test@test.com',
        'email_verified_at' => now(),
        'password' => Hash::make('12345678'),
        'role' => 'company'
    ]);

    $job1 = Job::create([
        'user_id' => $user->id,
        'title' => 'Software Engineer Full Time Test',
        'description' => 'A test description for full time job.',
        'salary' => 90000,
        'city' => 'Albany',
        'state' => 'NY',
        'contact_email' => 'test@test.com',
        'company_name' => 'Test Company',
        'job_type' => 'Full-Time',
        'remote' => 0,
        'status' => 'active',
    ]);

    $job2 = Job::create([
        'user_id' => $user->id,
        'title' => 'Marketing Specialist Part Time Test',
        'description' => 'A test description for part time job.',
        'salary' => 70000,
        'city' => 'San Francisco',
        'state' => 'CA',
        'contact_email' => 'test@test.com',
        'company_name' => 'Test Company',
        'job_type' => 'Part-Time',
        'remote' => 0,
        'status' => 'active',
    ]);

    $job3 = Job::create([
        'user_id' => $user->id,
        'title' => 'Web Developer Remote Test',
        'description' => 'A test description for remote full time job.',
        'salary' => 85000,
        'city' => 'Chicago',
        'state' => 'IL',
        'contact_email' => 'test@test.com',
        'company_name' => 'Test Company',
        'job_type' => 'Full-Time',
        'remote' => 1,
        'status' => 'active',
    ]);

    // 1. Test Full-time filter (should match Full-Time case-insensitively, matching Job 1 and Job 3)
    $response = $this->get('/jobs?job_type[]=Full-time');
    $response->assertStatus(200);
    $response->assertSee('Software Engineer Full Time Test');
    $response->assertSee('Web Developer Remote Test');
    $response->assertDontSee('Marketing Specialist Part Time Test');

    // 2. Test Part-time filter (should match Part-Time case-insensitively, matching Job 2)
    $response = $this->get('/jobs?job_type[]=Part-time');
    $response->assertStatus(200);
    $response->assertSee('Marketing Specialist Part Time Test');
    $response->assertDontSee('Software Engineer Full Time Test');
    $response->assertDontSee('Web Developer Remote Test');

    // 3. Test Remote filter (should match jobs with remote = 1, matching Job 3)
    $response = $this->get('/jobs?job_type[]=Remote');
    $response->assertStatus(200);
    $response->assertSee('Web Developer Remote Test');
    $response->assertDontSee('Software Engineer Full Time Test');
    $response->assertDontSee('Marketing Specialist Part Time Test');
});

test('empty query parameters do not count as active filters', function () {
    // Navigate with empty filters
    $response = $this->get('/jobs?min_salary=&job_type[]=');
    $response->assertStatus(200);
    $response->assertDontSee('Clear All Active Filters');
    // Ensure the badge span is not rendered
    $response->assertDontSee('bg-amber-600 text-white text-xs font-bold px-2 py-0.5 rounded-full');

    // Navigate with one actual filter
    $response = $this->get('/jobs?min_salary=50000');
    $response->assertStatus(200);
    $response->assertSee('Clear All Active Filters');
    $response->assertSee('bg-amber-600 text-white text-xs font-bold px-2 py-0.5 rounded-full');
});

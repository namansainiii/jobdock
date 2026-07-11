<?php

use App\Models\User;
use App\Models\Job;
use App\Models\Applicant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

test('profile can be updated and stores files on local public storage', function () {
    Storage::fake('public');

    $user = User::create([
        'name' => 'Original Seeker',
        'email' => 'seeker@test.com',
        'password' => bcrypt('password'),
        'role' => 'employee'
    ]);

    $this->actingAs($user);

    $avatar = UploadedFile::fake()->image('avatar.jpg');
    $resume = UploadedFile::fake()->create('resume.pdf', 100, 'application/pdf');

    $response = $this->put(route('profile.update'), [
        'name' => 'Updated Seeker Name',
        'email' => 'seeker@test.com',
        'avatar' => $avatar,
        'resume_path' => $resume,
        'about_me' => 'My bio details',
        'skills' => 'Laravel, React',
        'education' => 'Bachelor',
        'contact_phone' => '1234567890',
        'contact_email' => 'contact@test.com'
    ]);

    $response->assertRedirect(route('dashboard.index'));
    $response->assertSessionHas('success', 'Profile updated successfully!');

    $user->refresh();
    $this->assertEquals('Updated Seeker Name', $user->name);
    $this->assertNotNull($user->avatar);
    $this->assertNotNull($user->resume_path);

    // Verify files exist in the faked disk
    Storage::disk('public')->assertExists($user->avatar);
    Storage::disk('public')->assertExists($user->resume_path);
});

test('profile deleteResume removes files from local storage', function () {
    Storage::fake('public');

    $user = User::create([
        'name' => 'Test Seeker',
        'email' => 'seeker@test.com',
        'password' => bcrypt('password'),
        'role' => 'employee',
        'resume_path' => 'resumes/seeker_test_com_resume.pdf'
    ]);

    Storage::disk('public')->put('resumes/seeker_test_com_resume.pdf', 'dummy content');

    $this->actingAs($user);

    $response = $this->delete(route('profile.resume.delete'));

    $response->assertRedirect(route('dashboard.index'));
    $response->assertSessionHas('success', 'Resume removed successfully!');

    $user->refresh();
    $this->assertNull($user->resume_path);
    Storage::disk('public')->assertMissing('resumes/seeker_test_com_resume.pdf');
});

test('applicant deletion does not delete master profile resume if reused', function () {
    Storage::fake('public');

    $employer = User::create([
        'name' => 'Company',
        'email' => 'company@test.com',
        'password' => bcrypt('password'),
        'role' => 'company'
    ]);

    $seeker = User::create([
        'name' => 'Seeker',
        'email' => 'seeker@test.com',
        'password' => bcrypt('password'),
        'role' => 'employee',
        'resume_path' => 'resumes/seeker_test_com_resume.pdf'
    ]);

    $job = Job::create([
        'user_id' => $employer->id,
        'title' => 'Software Engineer',
        'description' => 'Job description',
        'salary' => 80000,
        'job_type' => 'Full-Time',
        'remote' => 0,
        'city' => 'New York',
        'state' => 'NY',
        'contact_email' => 'company@test.com',
        'company_name' => 'Company Inc',
        'status' => 'active'
    ]);

    $applicant = Applicant::create([
        'job_id' => $job->id,
        'user_id' => $seeker->id,
        'full_name' => 'Seeker',
        'contact_email' => 'seeker@test.com',
        'resume_path' => 'resumes/seeker_test_com_resume.pdf' // Reused profile resume
    ]);

    Storage::disk('public')->put('resumes/seeker_test_com_resume.pdf', 'dummy content');

    $this->actingAs($seeker);

    $response = $this->delete(route('applicants.destroy', $applicant->id));

    $response->assertRedirect();
    
    // The applicant should be deleted
    $this->assertDatabaseMissing('applicants', ['id' => $applicant->id]);
    
    // The master profile resume MUST STILL exist in the public storage!
    Storage::disk('public')->assertExists('resumes/seeker_test_com_resume.pdf');
});

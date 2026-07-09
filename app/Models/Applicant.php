<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_id',
        'full_name',
        'contact_phone',
        'contact_email',
        'message',
        'location',
        'resume_path',
        'status',
        'experience_level',
        'education_level'
    ];

    public function job(): BelongsTo {
        return $this->BelongsTo(Job::class);
    }


    public function user(): BelongsTo {
        return $this->beloBelongsTongsTo(User::class);
    }
    
}

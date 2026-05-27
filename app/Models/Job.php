<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Applicant;


class Job extends Model
{

    use HasFactory;
        
    protected $table = 'job_listings';
    protected $fillable = [
        'title' , 
        'description',
        'salary' , 
        'tags' ,
        'job_type' , 
        'remote' , 
        'requirements' , 
        'benefits'  , 
        'address' , 
        'city' , 
        'state' , 
        'zipcode' , 
        'contact_email' , 
        'contact_phone' , 
        'company_name' , 
        'company_description'  , 
        'company_logo' , 
        'company_website',
        'user_id'
    ];

    public function user() :BelongsTo
    {
        return $this->BelongsTo(User::class);
    }


    //relation to book marks
    public function bookmarkedByUsers() :BelongsToMany
    {
        return $this->BelongsToMany(User::class , 'job_user_bookmarks')->withTimestamps();
    }


    //relation to applicants
    public function applicants(): HasMany
    {
        return $this->hasMany(Applicant::class, 'job_id');
    }

    // public static function getJobs(): array{
        // return [
        //     [
        //         "id" => 1,
        //         "title" => "Software Engineer",
        //         "description" => "Develop and maintain web applications using Laravel and React."
        //     ],
        //     [
        //         "id" => 2,
        //         "title" => "Frontend Developer",
        //         "description" => "Build responsive user interfaces using HTML, CSS, JavaScript, and React."
        //     ],
        //     [
        //         "id" => 3,
        //         "title" => "Backend Developer",
        //         "description" => "Design APIs, manage databases, and implement server-side logic using PHP and Laravel."
        //     ],
        //     [
        //         "id" => 4,
        //         "title" => "Cyber Security Analyst",
        //         "description" => "Monitor systems for security threats and implement security best practices."
        //     ],
        //     [
        //         "id" => 5,
        //         "title" => "UI/UX Designer",
        //         "description" => "Create intuitive and visually appealing user experiences for web and mobile applications."
        //     ]
        // ];
    // }

}
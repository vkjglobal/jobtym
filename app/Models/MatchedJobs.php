<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchedJobs extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'employer_id', 'job_posts_id', 'status'
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function jobposts()
    {
        return $this->belongsTo(JobPost::class,'job_posts_id','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    use HasFactory;

    // Employers
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function userApply()
    {
        return $this->belongsTo(UserJobApply::class,'job_id');
    }

    public function applicants()
    {
        return UserJobApply::where('job_id', $this->id)->count();
    }
}

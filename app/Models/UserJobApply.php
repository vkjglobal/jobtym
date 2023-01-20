<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserJobApply extends Model
{
    use HasFactory;

    public function jobApply()
    {
        return $this->belongsTo(JobPost::class,'job_id');
    }

    public function employeName()
    {
        return $this->belongsTo(Employer::class,'employer');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}

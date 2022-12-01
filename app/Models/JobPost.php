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
}

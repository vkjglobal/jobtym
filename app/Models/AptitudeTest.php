<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AptitudeTest extends Model
{
    use HasFactory;

    // Employer
    public function employer()
    {
        return $this->hasOne(Employer::class);
    }

    // Category
    public function category()
    {
        return $this->hasOne(Category::class);
    }
}

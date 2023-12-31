<?php

namespace App\Models;

use App\Notifications\Employer\Auth\ResetPassword;
use App\Notifications\Employer\Auth\VerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Contracts\Auth\MustVerifyEmail;

class Employer extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    public $table = "employers";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'company_name', 'phone', 'company_phone', 'country', 'tin', 'address', 'street', 'city', 'about', 'website', 'facebook', 'instagram', 'linkedin', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }

    // Check Employer Status
    public function checkStatus()
    {
        $status = "Active";
        if ($this->status == 0) {
            $status = 'Inactive';
        }
        return $status;
    }

    // Employer Job Posts
    public function jobs()
    {
        return $this->hasMany(JobPost::class);
    }
}

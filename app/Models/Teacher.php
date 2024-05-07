<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\TeacherResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Teacher extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable =[
        'name',
        'phone',
        'address',
        'gender',
        'dob',
        'password',
        'image',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    public function chat()
    {
        return $this->hasOne(Chat::class);
    }
    public function course()
    {
        return $this->hasOne(Course::class);
    }

    public function subject()
    {
        return $this->hasOne(Subject::class);
    }
    public function result()
    {
        return $this->hasOne(Result::class);
    }
}

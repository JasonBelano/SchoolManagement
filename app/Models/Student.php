<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Student extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

        
    protected $fillable = ['firstname',
        'lastname','middlename','address',
        'contact', 'email', 'password'
    ];

        public function classes()
        {
            return $this->belongsToMany(Classes::class, 'class_student')->withPivot('student_id');
        }

        public function grade()
        {
            return $this->hasMany(Grade::class);
        }
}

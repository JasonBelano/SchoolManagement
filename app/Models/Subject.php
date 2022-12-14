<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

        protected $fillable = ['name'];

        public function classes()
        {
            return $this->hasMany(Classes::class);
        }

        public function grade()
        {
            return $this->hasMany(Grade::class);
        }
}

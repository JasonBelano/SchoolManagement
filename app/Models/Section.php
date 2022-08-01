<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Class_;

class Section extends Model
{
    use HasFactory;

        protected $fillabble = ['name'];

        public function classes()
        {
            return $this->hasMany(Classes::class);
        }
}

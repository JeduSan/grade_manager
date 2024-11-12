<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public $timestamps = false;
    protected $table = "teacher";
    protected $guarded = [];
}

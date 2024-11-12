<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    public $timestamps = false;
    protected $table = "academic_year";
    protected $guarded = [];
}

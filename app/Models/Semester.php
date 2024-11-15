<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Semester extends Model
{
    public $timestamps = false;
    protected $table = "semester";
    protected $guarded = [];

    public function academic_year() : BelongsTo {
        return $this->belongsTo(AcademicYear::class);
    }
}

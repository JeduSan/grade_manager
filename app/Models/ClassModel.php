<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    public $timestamps = false;
    protected $table = "class";
    protected $guarded = [];
}

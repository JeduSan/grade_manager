<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dept extends Model
{
    public $timestamps = false;
    protected $table = "dept";
    protected $guarded = [];
}

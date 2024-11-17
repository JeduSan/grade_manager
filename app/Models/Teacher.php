<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Teacher extends Model
{
    use Searchable;

    public $timestamps = false;
    protected $table = "teacher";
    protected $guarded = [];
    protected $primaryKey = "key";

    /**
     * Get the indexable data array for the model.
     *
     * @return array<string, mixed>
     */
    // #[SearchUsingPrefix(['id', 'email'])]
    public function toSearchableArray(): array
    {
        return [
            'teacher.id' => $this->teacher_id, // NOT WORKING, IDK WHY, I HAVE TRIED ADDING 'teacher.id' on the joins in the controller
            'teacher.lname' => $this->teacher_lname,
            'teacher.fname' => $this->teacher_fname,
            'dept.abbr' => $this->dept,
            'dept.description' => $this->dept_name
        ];
    }
}

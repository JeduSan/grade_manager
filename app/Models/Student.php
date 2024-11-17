<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Student extends Model
{
    use Searchable;

    public $timestamps = false;
    protected $table = "student";
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
            // 'teacher.id' => $this->teacher_id, // NOT WORKING, IDK WHY, I HAVE TRIED ADDING 'teacher.id' on the joins in the controller
            'student.lname' => $this->student_lname,
            'student.fname' => $this->student_fname,
            'student.mname' => $this->student_mname,
            'student.id' => $this->student_id
        ];
    }
}

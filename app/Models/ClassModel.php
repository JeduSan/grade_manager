<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use Searchable;

    public $timestamps = false;
    protected $table = "class";
    protected $guarded = [];

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
            'teacher.lname' => $this->teacher_lname,
            'teacher.fname' => $this->teacher_fname,
            'subject.description' => $this->subject,
            'course.abbr' => $this->course,
            'section' => $this->section,
            'year_level_id' => $this->year_level
        ];
    }
}

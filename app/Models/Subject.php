<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Subject extends Model
{
    use Searchable;

    public $timestamps = false;
    protected $table = "subject";
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
            'subject.code' => $this->subject_code,
            'subject.description' => $this->subject_description,
            'subject.units' => $this->subject_units
        ];
    }
}

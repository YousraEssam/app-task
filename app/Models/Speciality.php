<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Speciality extends Model
{
    use SoftDeletes;

    /**
     * Get the doctors for the speciality.
     */
    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}

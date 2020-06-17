<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PainType extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name' ];

    /**
     * The patients that belong to the pain type.
     */
    public function patients()
    {
        return $this->belongsToMany(Patient::class,'patient_pain_type','pain_type_id', 'patient_id');
    }
}

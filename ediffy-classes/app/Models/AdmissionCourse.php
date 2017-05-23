<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdmissionCourse extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'admission_course';
    public $timestamps = false;
    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['admission_id','course_id','module_id'];

    
}

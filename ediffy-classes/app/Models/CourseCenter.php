<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseCenter extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'course_modules';

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
    protected $fillable = ['name', 'duration'];

    
}

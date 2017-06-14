<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'employees';

    protected $dates = ['joining_date','dob'];

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
    protected $fillable = ['center_id', 'emp_id', 'full_name', 'dob', 'address', 'mobile_no', 'email', 'designation_id', 'joining_date', 'image'];

    
}

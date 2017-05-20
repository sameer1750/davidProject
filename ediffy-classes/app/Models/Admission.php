<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Admission extends Eloquent
{
    protected $connection = 'mongodb';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'admissions';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = '_id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['student_name', 'father_name', 'mother_name', 'caste', 'birth_date', 'gender', 'marital_status', 'aadhaar_card_no', 'res_address', 'telephone_r', 'telephone_o', 'zip_code', 'email', 'mobile_no', 'area', 'education', 'university', 'it_knowledge', 'inquiry_date', 'course_name', 'duration', 'course_fees', 'total_fees', 'preferred_batch', 'enquiry_source', 'enquiry_taken_by', 'remarks', 'next_followup_required', 'joining_chances'];

    
}

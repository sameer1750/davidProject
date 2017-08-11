<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Enquiry extends Eloquent
{
    protected $connection = 'mongodb';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'enquiries';
    protected $dates = ['birth_date','inquiry_date','enquiry_on'];
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
    protected $fillable = ['student_name', 'type', 'course_completion','father_name', 'mother_name', 'caste_id', 'birth_date', 'gender', 'marital_status', 'aadhaar_card_no', 'res_address', 'telephone_r', 'telephone_o', 'zip_code', 'email', 'mobile_no', 'area_id', 'education_id', 'university', 'it_knowledge', 'inquiry_date', 'course_id', 'duration', 'course_fees', 'total_fees', 'preferred_batch', 'enquiry_source', 'enquiry_taken_by', 'remarks', 'next_followup_required', 'joining_chances','fees_option','enquiry_on','center_id','job_required'];

    public function caste()
    {
        return $this->hasOne('App\Models\Caste','id','caste_id');
    }

    public function area()
    {
        return $this->hasOne('App\Models\Area','id','area_id');

    }

    public function education()
    {
        return $this->hasOne('App\Models\Education','id','education_id');

    }

    public function course()
    {
        return $this->hasMany('App\Models\Course','id','course_id');

    }

    public function center()
    {
        return $this->hasOne('App\Models\CourseCenter','id','center_id');

    }

    public function prefbatch()
    {
        return $this->hasOne('App\Models\Batch','id','preferred_batch');
    }

    public function enquirysrc()
    {
        return $this->hasOne('App\Models\EnquirySource','id','enquiry_source');
    }
}

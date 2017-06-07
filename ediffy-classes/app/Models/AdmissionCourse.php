<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class AdmissionCourse extends Model
{
    use HybridRelations;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'admission_course';
    public $timestamps = false;
    protected $dates = ['course_completion'];
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
    protected $fillable = ['admission_id','course_id','module_id','batch_id','course_completion'];

    public function course()
    {
        return $this->belongsTo('App\Models\Course','course_id','id');
    }
    public function module()
    {
        return $this->belongsTo('App\Models\CourseModule','module_id','id');
    }
    public function batch()
    {
        return $this->belongsTo('App\Models\Batch','batch_id','id');

    }
    
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'courses';
    protected $dates = ['start_date'];
    protected $appends = ['course_completion'];
    protected $connection = 'mysql';
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
    protected $fillable = ['name', 'short_name', 'Duration', 'start_date', 'govt_course', 'default_fees', 'default_royalty_fees'];

    public function modules()
    {
        return $this->belongsToMany('App\Models\CourseModule','course_to_modules','course_id','module_id');
    }

    public function center()
    {
        return $this->belongsToMany('App\Models\Center','course_center','course_id','center_id');
    }

    public function getCourseCompletionAttribute()
    {
        $data = $this->start_date;
        $totalDays = $this->Duration;
        $completionDate = Carbon::parse($data)->addDays($totalDays)->toDateTimeString();
        return $completionDate;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'batches';
    protected $appends = ['full_start_time','full_end_time'];
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
    protected $fillable = ['start_time', 'end_time', 'max_students','end_am_pm','start_am_pm'];

    public function modules()
    {
        return $this->belongsToMany('App\Models\CourseModule', 'batch_module', 'batch_id','module_id');
    }

    public function getFullStartTimeAttribute()
    {
        return $this->start_time.' '.$this->start_am_pm;
    }

    public function getFullEndTimeAttribute()
    {
        return $this->end_time.' '.$this->end_am_pm;
    }
}

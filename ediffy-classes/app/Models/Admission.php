<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Admission extends Eloquent
{
    protected $connection = 'mongodb';
    protected $dates = ['admission_date'];
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
    protected $guarded = ['_id'];

    public function fees()
    {
        return $this->hasMany('App\Models\AdmissionInstallment','admission_id','_id');
    }


}

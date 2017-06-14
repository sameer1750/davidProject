<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ActivityLog extends Eloquent
{
    protected $connection = 'mongodb';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'activity_logs';

    protected $dates = ['birth_date','inquiry_date','enquiry_on'];

    protected $primaryKey = '_id';

    protected $guarded = ['_id'];

    public function user()
    {
        return $this->hasOne('App\Models\User','id','user_id');
    }
}

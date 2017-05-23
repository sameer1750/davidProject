<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BatchModule extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'batch_module';
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
    protected $fillable = ['batch_id','module_id'];

    
}

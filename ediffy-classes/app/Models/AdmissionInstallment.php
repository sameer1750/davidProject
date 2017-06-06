<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class AdmissionInstallment extends Model
{
    use HybridRelations;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'admission_installments';
    protected $dates = ['due_date'];
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
    protected $fillable = ['admission_id','amount','due_date'];

    public function admission()
    {
        return $this->belongsTo('App\Models\Admission','admission_id','_id');
    }

}

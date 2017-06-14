<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalaryDetail extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'salary_details';
    protected $dates = ['applicable_from_date'];
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
    protected $fillable = ['employee_id', 'gross_salary', 'applicable_from_date', 'basic_salary', 'hra', 'special_allowance', 'medical_allowance', 'other_allowance', 'conveyance', 'incentive', 'income_tax', 'profession_tax', 'pf_deduction', 'per_month_deduction'];

    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $table = 'user_data';
    protected $fillable = [ "name","age","gender","photo","member","icecream","phone","city","state","zip","street1","street2","street3","user_id"];
}

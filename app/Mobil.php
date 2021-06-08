<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mobil extends Model
{
    use SoftDeletes;


    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}

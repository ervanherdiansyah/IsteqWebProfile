<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelAdminContact extends Model
{
    protected $table = 'contact';
    protected $guarded = ['id'];
}

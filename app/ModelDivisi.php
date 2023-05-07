<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelDivisi extends Model
{
    protected $table = 'divisi';
    protected $guarded = ['id'];
    
    public function team()
    {
        return $this->hasMany(ModelTeam::class, 'divisi_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelTeam extends Model
{
    protected $table = 'team';
    protected $guarded = ['id'];

    public function divisi()
    {
        return $this->belongsTo(ModelDivisi::class, 'divisi_id', 'id');
    }
}

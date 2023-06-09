<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelBeritaKategori extends Model
{
    protected $table = 'kategori';
    protected $guarded = ['id'];

    public function berita()
    {
        return $this->hasMany(ModelBerita::class, 'kategori_id');
    }
}

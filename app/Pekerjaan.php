<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    protected $fillable = ['namaPekerjaan','alamatPekerjaan','noTelpPekerjaan','mahasiswaId'];

    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa', 'mahasiswaId');
    }
}

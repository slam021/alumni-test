<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = ['namaMahasiswa','nimMahasiswa','angkatanMahasiswa','judulskripsiMahasiswa','pembimbing1','pembimbing2'];

    public function pekerjaans()
    {
        return $this->hasMany('App\Pekerjaan', 'mahasiswaId');
    }

    public function scopeFilter($query, $filters)
    {
        if (isset($filters['nama'])) {
            $query->where('namaMahasiswa', 'like', '%' . $filters['nama'] . '%');
        }

        if (isset($filters['nim'])) {
            $query->where('nimMahasiswa', 'like', '%' . $filters['nim'] . '%');
        }

        if (isset($filters['angkatan'])) {
            $query->where('angkatanMahasiswa', 'like', '%' . $filters['angkatan'] . '%');
        }

        if (isset($filters['judul'])) {
            $query->where('judulskripsiMahasiswa', 'like', '%' . $filters['judul'] . '%');
        }

        return $query;
    }
}

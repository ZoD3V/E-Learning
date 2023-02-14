<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'sekolah_id',
    ];

    protected $table = 'kelas';

    public function service_kelas_sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'sekolah_id', 'id');
    }

    public function service_kelas_materi()
    {
        return $this->hasMany(Materi::class);
    }

    public function service_kelas_mapel()
    {
        return $this->hasMany(Mapel::class);
    }
}

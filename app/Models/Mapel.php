<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'kelas_id',
        'sekolah_id',
    ];

    protected $table = 'mapel';

    public function service_mapel_sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'sekolah_id', 'id');
    }

    public function service_mapel()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }
    
    public function service_materi_materi()
    {
        return $this->hasMany(Materi::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'mapel_id',
        'image',
    ];
    protected $table = 'materi';

    public function service_materi_mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
}

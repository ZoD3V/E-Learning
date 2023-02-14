<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    protected $table = 'sekolah';

    public function service_user()
    {
        return $this->hasMany(User::class);
    }

    public function service_kelas()
    {
        return $this->hasMany(Kelas::class);
    }
}

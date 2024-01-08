<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $table = 'mhs_biodata';
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    protected $fillable = [
        'nim',
        'nama',
        'kelas',
        'prodi',
        'fakultas',
        'angkatan',
        'dosen_pa',
    ];

    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function dosenPA()
    {
        return $this->hasOne(DosenPA::class, 'id', 'dosen_pa');
    }
}


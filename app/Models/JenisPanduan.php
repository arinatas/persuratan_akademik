<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPanduan extends Model
{
    use HasFactory;

    protected $table = 'jenis_panduan';
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    protected $fillable = [
        'nama',
    ];

    // Definisikan relasi ke JenisPanduan
    public function panduans()
    {
        return $this->hasMany(Panduan::class, 'jenis_panduan', 'id');

    }

    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}


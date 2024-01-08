<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenandaTangan extends Model
{
    use HasFactory;

    protected $table = 'penanda_tangan';
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    protected $fillable = [
        'nidn',
        'nama',
        'jabatan',
        'file_ttd',
    ];

    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}


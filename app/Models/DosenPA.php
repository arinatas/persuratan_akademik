<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenPA extends Model
{
    use HasFactory;

    protected $table = 'dosen_pa';
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    protected $fillable = [
        'nidn',
        'nama',
        'jabatan',
    ];

    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}


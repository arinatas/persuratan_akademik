<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedoman extends Model
{
    use HasFactory;

    protected $table = 'pedoman';
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    protected $fillable = [
        'nama',
        'keterangan',
        'nama_file',
    ];

    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}


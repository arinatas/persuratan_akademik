<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panduan extends Model
{
    use HasFactory;

    protected $table = 'panduan';
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    protected $fillable = [
        'jenis_panduan',
        'judul',
        'desc1',
        'desc2',
        'desc3',
        'desc4',
        'desc5',
        'gambar',
        'nama_file',
    ];

    // Set nilai default untuk status_pin ke 0 dan tgl_terbit ke saat ini
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->attributes['tgl_terbit'] = now();
    }

    // Definisikan relasi ke JenisPanduan
    public function jenisPanduan()
    {
        return $this->belongsTo(JenisPanduan::class, 'jenis_panduan');
    }

    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}


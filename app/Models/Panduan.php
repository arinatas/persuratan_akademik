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
        'desc6',
        'desc7',
        'desc8',
        'ket_gambar_1',
        'ket_gambar_2',
        'ket_gambar_3',
        'ket_gambar_4',
        'ket_gambar_5',
        'ket_gambar_6',
        'ket_gambar_7',
        'ket_gambar_8',
        'gambar1',
        'gambar2',
        'gambar3',
        'gambar4',
        'gambar5',
        'gambar6',
        'gambar7',
        'gambar8',
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


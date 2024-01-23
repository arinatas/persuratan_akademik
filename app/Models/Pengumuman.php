<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = 'pengumuman';
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    protected $fillable = [
        'judul',
        'desc1',
        'desc2',
        'desc3',
        'desc4',
        'desc5',
        'gambar',
        'nama_file',
        'status_pin',
        'tgl_awal',
        'tgl_akhir',
        'tgl_terbit'
    ];

    // Set nilai default untuk status_pin ke 0 dan tgl_terbit ke saat ini
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->attributes['tgl_terbit'] = now();
    }

    public function scopeAktifHariIni($query)
    {
        return $query->whereDate('tgl_awal', '<=', Carbon::now())
                     ->whereDate('tgl_akhir', '>=', Carbon::now());
    }


    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}


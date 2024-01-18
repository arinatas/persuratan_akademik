<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class SuratMbkm extends Model
{
    use HasFactory;

    protected $table = 'surat_magang_mbkm';
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    protected $fillable = [
        'nomor',
        'yth',
        'tgl_mulai',
        'tgl_selesai',
        'nim1',
        'nama1',
        'prodi1',
        'nim2',
        'nama2',
        'prodi2',
        'nim3',
        'nama3',
        'prodi3',
        'nim4',
        'nama4',
        'prodi4',
        'nim5',
        'nama5',
        'prodi5',
        'status_acc',
        'acc_by',
    ];

    // Set nilai default untuk status_acc ke 0
    protected $attributes = [
        'status_acc' => 0
    ];

    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function getUser()
    {
        return $this->belongsTo(User::class, 'acc_by', 'id');
    }
}


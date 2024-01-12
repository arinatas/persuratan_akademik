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
        'tempat',
        'tgl_mulai',
        'tgl_selesai',
        'nim',
        'nama',
        'prodi',
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


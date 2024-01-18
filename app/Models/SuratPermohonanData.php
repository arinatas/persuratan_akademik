<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class SuratPermohonanData extends Model
{
    use HasFactory;

    protected $table = 'surat_permohonan_data';
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    protected $fillable = [
        'nomor',
        'yth',
        'nim',
        'data1',
        'data2',
        'data3',
        'data4',
        'data5',
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

    // Relasi dengan tabel user untuk mengambil data user login
    public function getUser()
    {
        return $this->belongsTo(User::class, 'acc_by', 'id');
    }

    // Relasi dengan tabel biodata untuk mengambil biodata mahasiswa
    public function biodata()
    {
        return $this->belongsTo(Biodata::class, 'nim', 'nim');
    }
}


<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DigerTahsilat extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'diger_tahsilats';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'tkategori_sec_id',
        'kategori_sec_id',
        'personel_sec_id',
        'cari_sec_id',
        'musteri_sec_id',
        'tutar',
        'birim_sec_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function tkategori_sec()
    {
        return $this->belongsTo(TahsilatKategorileri::class, 'tkategori_sec_id');
    }

    public function kategori_sec()
    {
        return $this->belongsTo(BorcKategorileri::class, 'kategori_sec_id');
    }

    public function personel_sec()
    {
        return $this->belongsTo(User::class, 'personel_sec_id');
    }

    public function cari_sec()
    {
        return $this->belongsTo(Cariler::class, 'cari_sec_id');
    }

    public function musteri_sec()
    {
        return $this->belongsTo(Musteriler::class, 'musteri_sec_id');
    }

    public function birim_sec()
    {
        return $this->belongsTo(Parabirimi::class, 'birim_sec_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

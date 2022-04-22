<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RezervasyonTahsilat extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'rezervasyon_tahsilats';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'musteri_sec_id',
        'rezervasyon_sec_id',
        'kasa_sec_id',
        'tutar',
        'aciklama',
        'birim_sec_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function musteri_sec()
    {
        return $this->belongsTo(Musteriler::class, 'musteri_sec_id');
    }

    public function rezervasyon_sec()
    {
        return $this->belongsTo(Rezervasyonlar::class, 'rezervasyon_sec_id');
    }

    public function kasa_sec()
    {
        return $this->belongsTo(Kasalar::class, 'kasa_sec_id');
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

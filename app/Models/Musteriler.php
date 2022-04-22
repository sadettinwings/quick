<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Musteriler extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'musterilers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'musteri_adi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function musteriSecRezervasyonTahsilats()
    {
        return $this->hasMany(RezervasyonTahsilat::class, 'musteri_sec_id', 'id');
    }

    public function musteriSecDigerTahsilats()
    {
        return $this->hasMany(DigerTahsilat::class, 'musteri_sec_id', 'id');
    }

    public function musteriSecRezervasyonOdemeleris()
    {
        return $this->hasMany(RezervasyonOdemeleri::class, 'musteri_sec_id', 'id');
    }

    public function musteriSecAlacaklars()
    {
        return $this->hasMany(Alacaklar::class, 'musteri_sec_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parabirimi extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'parabirimis';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'birim',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function birimSecBorclars()
    {
        return $this->hasMany(Borclar::class, 'birim_sec_id', 'id');
    }

    public function birimSecRezervasyonTahsilats()
    {
        return $this->hasMany(RezervasyonTahsilat::class, 'birim_sec_id', 'id');
    }

    public function birimSecDigerTahsilats()
    {
        return $this->hasMany(DigerTahsilat::class, 'birim_sec_id', 'id');
    }

    public function birimSecTesisOdemeleris()
    {
        return $this->hasMany(TesisOdemeleri::class, 'birim_sec_id', 'id');
    }

    public function birimSecPersonelOdemeleris()
    {
        return $this->hasMany(PersonelOdemeleri::class, 'birim_sec_id', 'id');
    }

    public function birimSecHarcamalars()
    {
        return $this->hasMany(Harcamalar::class, 'birim_sec_id', 'id');
    }

    public function birimSecRezervasyonOdemeleris()
    {
        return $this->hasMany(RezervasyonOdemeleri::class, 'birim_sec_id', 'id');
    }

    public function birimSecAlacaklars()
    {
        return $this->hasMany(Alacaklar::class, 'birim_sec_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

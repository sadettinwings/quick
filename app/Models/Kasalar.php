<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kasalar extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'kasalars';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kasa_adi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function kasaSecRezervasyonTahsilats()
    {
        return $this->hasMany(RezervasyonTahsilat::class, 'kasa_sec_id', 'id');
    }

    public function kasaSecTesisOdemeleris()
    {
        return $this->hasMany(TesisOdemeleri::class, 'kasa_sec_id', 'id');
    }

    public function kasaSecHarcamalars()
    {
        return $this->hasMany(Harcamalar::class, 'kasa_sec_id', 'id');
    }

    public function kasaSecPersonelOdemeleris()
    {
        return $this->hasMany(PersonelOdemeleri::class, 'kasa_sec_id', 'id');
    }

    public function kasaSecRezervasyonOdemeleris()
    {
        return $this->hasMany(RezervasyonOdemeleri::class, 'kasa_sec_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

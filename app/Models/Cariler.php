<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cariler extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'carilers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'cari_adi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function cariSecBorclars()
    {
        return $this->hasMany(Borclar::class, 'cari_sec_id', 'id');
    }

    public function cariSecDigerTahsilats()
    {
        return $this->hasMany(DigerTahsilat::class, 'cari_sec_id', 'id');
    }

    public function cariSecHarcamalars()
    {
        return $this->hasMany(Harcamalar::class, 'cari_sec_id', 'id');
    }

    public function cariSecAlacaklars()
    {
        return $this->hasMany(Alacaklar::class, 'cari_sec_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

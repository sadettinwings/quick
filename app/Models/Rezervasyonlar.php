<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rezervasyonlar extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'rezervasyonlars';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'rezervarsyon_kodu',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function rezervasyonSecRezervasyonTahsilats()
    {
        return $this->hasMany(RezervasyonTahsilat::class, 'rezervasyon_sec_id', 'id');
    }

    public function rezervasyonSecTesisOdemeleris()
    {
        return $this->hasMany(TesisOdemeleri::class, 'rezervasyon_sec_id', 'id');
    }

    public function rezervasyonSecRezervasyonOdemeleris()
    {
        return $this->hasMany(RezervasyonOdemeleri::class, 'rezervasyon_sec_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

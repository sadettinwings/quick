<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TesisOdemeleri extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'tesis_odemeleris';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'tesis_sec_id',
        'borc_sec_id',
        'rezervasyon_sec_id',
        'tutar',
        'kasa_sec_id',
        'birim_sec_id',
        'aciklama',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function tesis_sec()
    {
        return $this->belongsTo(EvSahipleri::class, 'tesis_sec_id');
    }

    public function borc_sec()
    {
        return $this->belongsTo(Borclar::class, 'borc_sec_id');
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

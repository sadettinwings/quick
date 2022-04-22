<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Harcamalar extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'harcamalars';

    protected $dates = [
        'tarih',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'harcama_kategori_id',
        'borc_sec_id',
        'cari_sec_id',
        'tutar',
        'birim_sec_id',
        'tarih',
        'kasa_sec_id',
        'aciklama',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function harcama_kategori()
    {
        return $this->belongsTo(HarcamaKategorileri::class, 'harcama_kategori_id');
    }

    public function borc_sec()
    {
        return $this->belongsTo(Borclar::class, 'borc_sec_id');
    }

    public function cari_sec()
    {
        return $this->belongsTo(Cariler::class, 'cari_sec_id');
    }

    public function birim_sec()
    {
        return $this->belongsTo(Parabirimi::class, 'birim_sec_id');
    }

    public function getTarihAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTarihAttribute($value)
    {
        $this->attributes['tarih'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function kasa_sec()
    {
        return $this->belongsTo(Kasalar::class, 'kasa_sec_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alacaklar extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'alacaklars';

    protected $dates = [
        'odeme_tarihi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'musteri_sec_id',
        'tesis_sec_id',
        'cari_sec_id',
        'tutar',
        'birim_sec_id',
        'aciklama',
        'odeme_tarihi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function musteri_sec()
    {
        return $this->belongsTo(Musteriler::class, 'musteri_sec_id');
    }

    public function tesis_sec()
    {
        return $this->belongsTo(EvSahipleri::class, 'tesis_sec_id');
    }

    public function cari_sec()
    {
        return $this->belongsTo(Cariler::class, 'cari_sec_id');
    }

    public function birim_sec()
    {
        return $this->belongsTo(Parabirimi::class, 'birim_sec_id');
    }

    public function getOdemeTarihiAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setOdemeTarihiAttribute($value)
    {
        $this->attributes['odeme_tarihi'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

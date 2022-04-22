<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonelOdemeleri extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'personel_odemeleris';

    protected $dates = [
        'tarih',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'personel_sec_id',
        'personel_kategori_id',
        'tarih',
        'tutar',
        'birim_sec_id',
        'aciklama',
        'kasa_sec_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function personel_sec()
    {
        return $this->belongsTo(User::class, 'personel_sec_id');
    }

    public function personel_kategori()
    {
        return $this->belongsTo(PersonelOdemeKategori::class, 'personel_kategori_id');
    }

    public function getTarihAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTarihAttribute($value)
    {
        $this->attributes['tarih'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function birim_sec()
    {
        return $this->belongsTo(Parabirimi::class, 'birim_sec_id');
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

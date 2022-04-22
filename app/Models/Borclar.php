<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Borclar extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'borclars';

    protected $dates = [
        'odeme_tarihi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'cari_sec_id',
        'evsahibi_sec_id',
        'personel_sec_id',
        'borc_aciklama',
        'tutar',
        'birim_sec_id',
        'not',
        'odeme_tarihi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function borcSecTesisOdemeleris()
    {
        return $this->hasMany(TesisOdemeleri::class, 'borc_sec_id', 'id');
    }

    public function borcSecHarcamalars()
    {
        return $this->hasMany(Harcamalar::class, 'borc_sec_id', 'id');
    }

    public function cari_sec()
    {
        return $this->belongsTo(Cariler::class, 'cari_sec_id');
    }

    public function evsahibi_sec()
    {
        return $this->belongsTo(EvSahipleri::class, 'evsahibi_sec_id');
    }

    public function personel_sec()
    {
        return $this->belongsTo(User::class, 'personel_sec_id');
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

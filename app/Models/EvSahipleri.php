<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvSahipleri extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'ev_sahipleris';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'evsahibi_adi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function evsahibiSecBorclars()
    {
        return $this->hasMany(Borclar::class, 'evsahibi_sec_id', 'id');
    }

    public function tesisSecTesisOdemeleris()
    {
        return $this->hasMany(TesisOdemeleri::class, 'tesis_sec_id', 'id');
    }

    public function tesisSecAlacaklars()
    {
        return $this->hasMany(Alacaklar::class, 'tesis_sec_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TahsilatKategorileri extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'tahsilat_kategorileris';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'tkategori_adi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function tkategoriSecDigerTahsilats()
    {
        return $this->hasMany(DigerTahsilat::class, 'tkategori_sec_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HarcamaKategorileri extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'harcama_kategorileris';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'hkategori',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function harcamaKategoriHarcamalars()
    {
        return $this->hasMany(Harcamalar::class, 'harcama_kategori_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

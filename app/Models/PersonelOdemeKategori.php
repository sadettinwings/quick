<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonelOdemeKategori extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'personel_odeme_kategoris';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'pkategori',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function personelKategoriPersonelOdemeleris()
    {
        return $this->hasMany(PersonelOdemeleri::class, 'personel_kategori_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

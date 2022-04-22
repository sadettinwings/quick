<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'kasalar_create',
            ],
            [
                'id'    => 18,
                'title' => 'kasalar_edit',
            ],
            [
                'id'    => 19,
                'title' => 'kasalar_show',
            ],
            [
                'id'    => 20,
                'title' => 'kasalar_delete',
            ],
            [
                'id'    => 21,
                'title' => 'kasalar_access',
            ],
            [
                'id'    => 22,
                'title' => 'ev_sahipleri_create',
            ],
            [
                'id'    => 23,
                'title' => 'ev_sahipleri_edit',
            ],
            [
                'id'    => 24,
                'title' => 'ev_sahipleri_show',
            ],
            [
                'id'    => 25,
                'title' => 'ev_sahipleri_delete',
            ],
            [
                'id'    => 26,
                'title' => 'ev_sahipleri_access',
            ],
            [
                'id'    => 27,
                'title' => 'cariler_create',
            ],
            [
                'id'    => 28,
                'title' => 'cariler_edit',
            ],
            [
                'id'    => 29,
                'title' => 'cariler_show',
            ],
            [
                'id'    => 30,
                'title' => 'cariler_delete',
            ],
            [
                'id'    => 31,
                'title' => 'cariler_access',
            ],
            [
                'id'    => 32,
                'title' => 'borclar_create',
            ],
            [
                'id'    => 33,
                'title' => 'borclar_edit',
            ],
            [
                'id'    => 34,
                'title' => 'borclar_show',
            ],
            [
                'id'    => 35,
                'title' => 'borclar_delete',
            ],
            [
                'id'    => 36,
                'title' => 'borclar_access',
            ],
            [
                'id'    => 37,
                'title' => 'parabirimi_create',
            ],
            [
                'id'    => 38,
                'title' => 'parabirimi_edit',
            ],
            [
                'id'    => 39,
                'title' => 'parabirimi_show',
            ],
            [
                'id'    => 40,
                'title' => 'parabirimi_delete',
            ],
            [
                'id'    => 41,
                'title' => 'parabirimi_access',
            ],
            [
                'id'    => 42,
                'title' => 'musteriler_create',
            ],
            [
                'id'    => 43,
                'title' => 'musteriler_edit',
            ],
            [
                'id'    => 44,
                'title' => 'musteriler_show',
            ],
            [
                'id'    => 45,
                'title' => 'musteriler_delete',
            ],
            [
                'id'    => 46,
                'title' => 'musteriler_access',
            ],
            [
                'id'    => 47,
                'title' => 'rezervasyonlar_create',
            ],
            [
                'id'    => 48,
                'title' => 'rezervasyonlar_edit',
            ],
            [
                'id'    => 49,
                'title' => 'rezervasyonlar_show',
            ],
            [
                'id'    => 50,
                'title' => 'rezervasyonlar_delete',
            ],
            [
                'id'    => 51,
                'title' => 'rezervasyonlar_access',
            ],
            [
                'id'    => 52,
                'title' => 'rezervasyon_tahsilat_create',
            ],
            [
                'id'    => 53,
                'title' => 'rezervasyon_tahsilat_edit',
            ],
            [
                'id'    => 54,
                'title' => 'rezervasyon_tahsilat_show',
            ],
            [
                'id'    => 55,
                'title' => 'rezervasyon_tahsilat_delete',
            ],
            [
                'id'    => 56,
                'title' => 'rezervasyon_tahsilat_access',
            ],
            [
                'id'    => 57,
                'title' => 'diger_tahsilat_create',
            ],
            [
                'id'    => 58,
                'title' => 'diger_tahsilat_edit',
            ],
            [
                'id'    => 59,
                'title' => 'diger_tahsilat_show',
            ],
            [
                'id'    => 60,
                'title' => 'diger_tahsilat_delete',
            ],
            [
                'id'    => 61,
                'title' => 'diger_tahsilat_access',
            ],
            [
                'id'    => 62,
                'title' => 'tahsilat_kategorileri_create',
            ],
            [
                'id'    => 63,
                'title' => 'tahsilat_kategorileri_edit',
            ],
            [
                'id'    => 64,
                'title' => 'tahsilat_kategorileri_show',
            ],
            [
                'id'    => 65,
                'title' => 'tahsilat_kategorileri_delete',
            ],
            [
                'id'    => 66,
                'title' => 'tahsilat_kategorileri_access',
            ],
            [
                'id'    => 67,
                'title' => 'tanimlamalar_access',
            ],
            [
                'id'    => 68,
                'title' => 'borc_kategorileri_create',
            ],
            [
                'id'    => 69,
                'title' => 'borc_kategorileri_edit',
            ],
            [
                'id'    => 70,
                'title' => 'borc_kategorileri_show',
            ],
            [
                'id'    => 71,
                'title' => 'borc_kategorileri_delete',
            ],
            [
                'id'    => 72,
                'title' => 'borc_kategorileri_access',
            ],
            [
                'id'    => 73,
                'title' => 'harcama_kategorileri_create',
            ],
            [
                'id'    => 74,
                'title' => 'harcama_kategorileri_edit',
            ],
            [
                'id'    => 75,
                'title' => 'harcama_kategorileri_show',
            ],
            [
                'id'    => 76,
                'title' => 'harcama_kategorileri_delete',
            ],
            [
                'id'    => 77,
                'title' => 'harcama_kategorileri_access',
            ],
            [
                'id'    => 78,
                'title' => 'tesis_odemeleri_create',
            ],
            [
                'id'    => 79,
                'title' => 'tesis_odemeleri_edit',
            ],
            [
                'id'    => 80,
                'title' => 'tesis_odemeleri_show',
            ],
            [
                'id'    => 81,
                'title' => 'tesis_odemeleri_delete',
            ],
            [
                'id'    => 82,
                'title' => 'tesis_odemeleri_access',
            ],
            [
                'id'    => 83,
                'title' => 'muhasebe_access',
            ],
            [
                'id'    => 84,
                'title' => 'personel_odeme_kategori_create',
            ],
            [
                'id'    => 85,
                'title' => 'personel_odeme_kategori_edit',
            ],
            [
                'id'    => 86,
                'title' => 'personel_odeme_kategori_show',
            ],
            [
                'id'    => 87,
                'title' => 'personel_odeme_kategori_delete',
            ],
            [
                'id'    => 88,
                'title' => 'personel_odeme_kategori_access',
            ],
            [
                'id'    => 89,
                'title' => 'personel_odemeleri_create',
            ],
            [
                'id'    => 90,
                'title' => 'personel_odemeleri_edit',
            ],
            [
                'id'    => 91,
                'title' => 'personel_odemeleri_show',
            ],
            [
                'id'    => 92,
                'title' => 'personel_odemeleri_delete',
            ],
            [
                'id'    => 93,
                'title' => 'personel_odemeleri_access',
            ],
            [
                'id'    => 94,
                'title' => 'harcamalar_create',
            ],
            [
                'id'    => 95,
                'title' => 'harcamalar_edit',
            ],
            [
                'id'    => 96,
                'title' => 'harcamalar_show',
            ],
            [
                'id'    => 97,
                'title' => 'harcamalar_delete',
            ],
            [
                'id'    => 98,
                'title' => 'harcamalar_access',
            ],
            [
                'id'    => 99,
                'title' => 'rezervasyon_odemeleri_create',
            ],
            [
                'id'    => 100,
                'title' => 'rezervasyon_odemeleri_edit',
            ],
            [
                'id'    => 101,
                'title' => 'rezervasyon_odemeleri_show',
            ],
            [
                'id'    => 102,
                'title' => 'rezervasyon_odemeleri_delete',
            ],
            [
                'id'    => 103,
                'title' => 'rezervasyon_odemeleri_access',
            ],
            [
                'id'    => 104,
                'title' => 'alacaklar_create',
            ],
            [
                'id'    => 105,
                'title' => 'alacaklar_edit',
            ],
            [
                'id'    => 106,
                'title' => 'alacaklar_show',
            ],
            [
                'id'    => 107,
                'title' => 'alacaklar_delete',
            ],
            [
                'id'    => 108,
                'title' => 'alacaklar_access',
            ],
            [
                'id'    => 109,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}

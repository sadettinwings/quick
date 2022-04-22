<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Kasalar
    Route::apiResource('kasalars', 'KasalarApiController');

    // Ev Sahipleri
    Route::apiResource('ev-sahipleris', 'EvSahipleriApiController');

    // Parabirimi
    Route::apiResource('parabirimis', 'ParabirimiApiController');

    // Musteriler
    Route::apiResource('musterilers', 'MusterilerApiController');

    // Rezervasyonlar
    Route::apiResource('rezervasyonlars', 'RezervasyonlarApiController');

    // Rezervasyon Tahsilat
    Route::apiResource('rezervasyon-tahsilats', 'RezervasyonTahsilatApiController');

    // Diger Tahsilat
    Route::apiResource('diger-tahsilats', 'DigerTahsilatApiController');

    // Tahsilat Kategorileri
    Route::apiResource('tahsilat-kategorileris', 'TahsilatKategorileriApiController');

    // Borc Kategorileri
    Route::apiResource('borc-kategorileris', 'BorcKategorileriApiController');

    // Harcama Kategorileri
    Route::apiResource('harcama-kategorileris', 'HarcamaKategorileriApiController');

    // Tesis Odemeleri
    Route::apiResource('tesis-odemeleris', 'TesisOdemeleriApiController');

    // Personel Odeme Kategori
    Route::apiResource('personel-odeme-kategoris', 'PersonelOdemeKategoriApiController');

    // Personel Odemeleri
    Route::apiResource('personel-odemeleris', 'PersonelOdemeleriApiController');

    // Harcamalar
    Route::apiResource('harcamalars', 'HarcamalarApiController');

    // Rezervasyon Odemeleri
    Route::apiResource('rezervasyon-odemeleris', 'RezervasyonOdemeleriApiController');
});

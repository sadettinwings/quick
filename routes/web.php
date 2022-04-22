<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Kasalar
    Route::delete('kasalars/destroy', 'KasalarController@massDestroy')->name('kasalars.massDestroy');
    Route::resource('kasalars', 'KasalarController');

    // Ev Sahipleri
    Route::delete('ev-sahipleris/destroy', 'EvSahipleriController@massDestroy')->name('ev-sahipleris.massDestroy');
    Route::resource('ev-sahipleris', 'EvSahipleriController');

    // Cariler
    Route::delete('carilers/destroy', 'CarilerController@massDestroy')->name('carilers.massDestroy');
    Route::resource('carilers', 'CarilerController');

    // Borclar
    Route::delete('borclars/destroy', 'BorclarController@massDestroy')->name('borclars.massDestroy');
    Route::resource('borclars', 'BorclarController');

    // Parabirimi
    Route::delete('parabirimis/destroy', 'ParabirimiController@massDestroy')->name('parabirimis.massDestroy');
    Route::resource('parabirimis', 'ParabirimiController');

    // Musteriler
    Route::delete('musterilers/destroy', 'MusterilerController@massDestroy')->name('musterilers.massDestroy');
    Route::resource('musterilers', 'MusterilerController');

    // Rezervasyonlar
    Route::delete('rezervasyonlars/destroy', 'RezervasyonlarController@massDestroy')->name('rezervasyonlars.massDestroy');
    Route::resource('rezervasyonlars', 'RezervasyonlarController');

    // Rezervasyon Tahsilat
    Route::delete('rezervasyon-tahsilats/destroy', 'RezervasyonTahsilatController@massDestroy')->name('rezervasyon-tahsilats.massDestroy');
    Route::resource('rezervasyon-tahsilats', 'RezervasyonTahsilatController');

    // Diger Tahsilat
    Route::delete('diger-tahsilats/destroy', 'DigerTahsilatController@massDestroy')->name('diger-tahsilats.massDestroy');
    Route::resource('diger-tahsilats', 'DigerTahsilatController');

    // Tahsilat Kategorileri
    Route::delete('tahsilat-kategorileris/destroy', 'TahsilatKategorileriController@massDestroy')->name('tahsilat-kategorileris.massDestroy');
    Route::resource('tahsilat-kategorileris', 'TahsilatKategorileriController');

    // Borc Kategorileri
    Route::delete('borc-kategorileris/destroy', 'BorcKategorileriController@massDestroy')->name('borc-kategorileris.massDestroy');
    Route::resource('borc-kategorileris', 'BorcKategorileriController');

    // Harcama Kategorileri
    Route::delete('harcama-kategorileris/destroy', 'HarcamaKategorileriController@massDestroy')->name('harcama-kategorileris.massDestroy');
    Route::resource('harcama-kategorileris', 'HarcamaKategorileriController');

    // Tesis Odemeleri
    Route::delete('tesis-odemeleris/destroy', 'TesisOdemeleriController@massDestroy')->name('tesis-odemeleris.massDestroy');
    Route::resource('tesis-odemeleris', 'TesisOdemeleriController');

    // Personel Odeme Kategori
    Route::delete('personel-odeme-kategoris/destroy', 'PersonelOdemeKategoriController@massDestroy')->name('personel-odeme-kategoris.massDestroy');
    Route::resource('personel-odeme-kategoris', 'PersonelOdemeKategoriController');

    // Personel Odemeleri
    Route::delete('personel-odemeleris/destroy', 'PersonelOdemeleriController@massDestroy')->name('personel-odemeleris.massDestroy');
    Route::resource('personel-odemeleris', 'PersonelOdemeleriController');

    // Harcamalar
    Route::delete('harcamalars/destroy', 'HarcamalarController@massDestroy')->name('harcamalars.massDestroy');
    Route::resource('harcamalars', 'HarcamalarController');

    // Rezervasyon Odemeleri
    Route::delete('rezervasyon-odemeleris/destroy', 'RezervasyonOdemeleriController@massDestroy')->name('rezervasyon-odemeleris.massDestroy');
    Route::resource('rezervasyon-odemeleris', 'RezervasyonOdemeleriController');

    // Alacaklar
    Route::delete('alacaklars/destroy', 'AlacaklarController@massDestroy')->name('alacaklars.massDestroy');
    Route::resource('alacaklars', 'AlacaklarController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

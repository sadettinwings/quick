<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('musteriler_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.musterilers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/musterilers") || request()->is("admin/musterilers/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.musteriler.title') }}
                </a>
            </li>
        @endcan
        @can('rezervasyonlar_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.rezervasyonlars.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/rezervasyonlars") || request()->is("admin/rezervasyonlars/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.rezervasyonlar.title') }}
                </a>
            </li>
        @endcan
        @can('ev_sahipleri_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.ev-sahipleris.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/ev-sahipleris") || request()->is("admin/ev-sahipleris/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.evSahipleri.title') }}
                </a>
            </li>
        @endcan
        @can('muhasebe_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/carilers*") ? "c-show" : "" }} {{ request()->is("admin/borclars*") ? "c-show" : "" }} {{ request()->is("admin/alacaklars*") ? "c-show" : "" }} {{ request()->is("admin/kasalars*") ? "c-show" : "" }} {{ request()->is("admin/rezervasyon-tahsilats*") ? "c-show" : "" }} {{ request()->is("admin/diger-tahsilats*") ? "c-show" : "" }} {{ request()->is("admin/tesis-odemeleris*") ? "c-show" : "" }} {{ request()->is("admin/personel-odemeleris*") ? "c-show" : "" }} {{ request()->is("admin/harcamalars*") ? "c-show" : "" }} {{ request()->is("admin/rezervasyon-odemeleris*") ? "c-show" : "" }} {{ request()->is("admin/parabirimis*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.muhasebe.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('cariler_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.carilers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/carilers") || request()->is("admin/carilers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.cariler.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('borclar_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.borclars.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/borclars") || request()->is("admin/borclars/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.borclar.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('alacaklar_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.alacaklars.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/alacaklars") || request()->is("admin/alacaklars/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.alacaklar.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('kasalar_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.kasalars.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/kasalars") || request()->is("admin/kasalars/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.kasalar.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('rezervasyon_tahsilat_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.rezervasyon-tahsilats.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/rezervasyon-tahsilats") || request()->is("admin/rezervasyon-tahsilats/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.rezervasyonTahsilat.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('diger_tahsilat_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.diger-tahsilats.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/diger-tahsilats") || request()->is("admin/diger-tahsilats/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.digerTahsilat.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('tesis_odemeleri_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.tesis-odemeleris.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tesis-odemeleris") || request()->is("admin/tesis-odemeleris/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.tesisOdemeleri.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('personel_odemeleri_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.personel-odemeleris.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/personel-odemeleris") || request()->is("admin/personel-odemeleris/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.personelOdemeleri.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('harcamalar_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.harcamalars.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/harcamalars") || request()->is("admin/harcamalars/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.harcamalar.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('rezervasyon_odemeleri_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.rezervasyon-odemeleris.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/rezervasyon-odemeleris") || request()->is("admin/rezervasyon-odemeleris/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.rezervasyonOdemeleri.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('parabirimi_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.parabirimis.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/parabirimis") || request()->is("admin/parabirimis/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.parabirimi.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('tanimlamalar_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/tahsilat-kategorileris*") ? "c-show" : "" }} {{ request()->is("admin/borc-kategorileris*") ? "c-show" : "" }} {{ request()->is("admin/harcama-kategorileris*") ? "c-show" : "" }} {{ request()->is("admin/personel-odeme-kategoris*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.tanimlamalar.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('tahsilat_kategorileri_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.tahsilat-kategorileris.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tahsilat-kategorileris") || request()->is("admin/tahsilat-kategorileris/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.tahsilatKategorileri.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('borc_kategorileri_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.borc-kategorileris.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/borc-kategorileris") || request()->is("admin/borc-kategorileris/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.borcKategorileri.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('harcama_kategorileri_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.harcama-kategorileris.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/harcama-kategorileris") || request()->is("admin/harcama-kategorileris/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.harcamaKategorileri.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('personel_odeme_kategori_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.personel-odeme-kategoris.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/personel-odeme-kategoris") || request()->is("admin/personel-odeme-kategoris/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.personelOdemeKategori.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.systemCalendar") }}" class="c-sidebar-nav-link {{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "c-active" : "" }}">
                <i class="c-sidebar-nav-icon fa-fw fas fa-calendar">

                </i>
                {{ trans('global.systemCalendar') }}
            </a>
        </li>
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>
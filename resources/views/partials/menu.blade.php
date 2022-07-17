<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            SISFO-SDM-FK
        </a>
    </div>
    <div class="user-panel mt-3 p-3 mb-3 d-flex">
        <div class="info">
              <p>Selamat Datang, {{ auth()->user()->name }}</p>
          </div>
    </div>
    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route('admin.home') }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                Dashboard
            </a>
        </li>
        @can('user_management_access')
            <li
                class="c-sidebar-nav-dropdown {{ request()->is('admin/permissions*') ? 'c-show' : '' }} {{ request()->is('admin/roles*') ? 'c-show' : '' }} {{ request()->is('admin/users*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    User Management
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.permissions.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                Izin
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.roles.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                Peranan
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.users.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                User
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('profil_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is('admin/biodata*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                    </i>
                    Profil
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('biodatum_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.biodata.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/biodata') || request()->is('admin/biodata/*') ? 'c-active' : '' }}">
                                Data Diri
                            </a>
                        </li>
                    @endcan
                    @can('impasing_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.impasings.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/impasings') || request()->is('admin/impasings/*') ? 'c-active' : '' }}">
                                Inpassing
                            </a>
                        </li>
                    @endcan
                    @can('jafung_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.jafungs.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/jafungs') || request()->is('admin/jafungs/*') ? 'c-active' : '' }}">
                                Jabatan Fungsional
                            </a>
                        </li>
                    @endcan
                    @can('kepangkatan_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.kepangkatans.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/kepangkatans') || request()->is('admin/kepangkatans/*') ? 'c-active' : '' }}">
                                Kepangkatan
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('kualifikasi_access')
            <li
                class="c-sidebar-nav-dropdown {{ request()->is('admin/pendidikans*') ? 'c-show' : '' }} {{ request()->is('admin/diklats*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-graduation-cap c-sidebar-nav-icon">

                    </i>
                    Kualifikasi
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('pendidikan_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.pendidikans.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/pendidikans') || request()->is('admin/pendidikans/*') ? 'c-active' : '' }}">
                                Pendidikan Formal
                            </a>
                        </li>
                    @endcan
                    @can('diklat_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.diklats.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/diklats') || request()->is('admin/diklats/*') ? 'c-active' : '' }}">
                                Diklat / Peningkatan Kompetensi Dosen
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('kompetensi_access')
            <li
                class="c-sidebar-nav-dropdown {{ request()->is('admin/sertifikasis*') ? 'c-show' : '' }} {{ request()->is('admin/sertifikasiprofs*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-user-graduate c-sidebar-nav-icon">

                    </i>
                    Kompetensi
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('sertifikasi_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.sertifikasis.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/sertifikasis') || request()->is('admin/sertifikasis/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                Sertifikasi Dosen
                            </a>
                        </li>
                    @endcan
                    @can('sertifikasiprof_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.sertifikasiprofs.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/sertifikasiprofs') || request()->is('admin/sertifikasiprofs/*') ? 'c-active' : '' }}">
                                <i class="fa-fw far fa-file-alt c-sidebar-nav-icon">

                                </i>
                                Sertifikasi Profesi
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('studi_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.studis.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/studis') || request()->is('admin/studis/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-address-book c-sidebar-nav-icon">

                    </i>
                    Studi Lanjut
                </a>
            </li>
        @endcan
        @can('rekognisi_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.rekognisis.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/rekognisis') || request()->is('admin/rekognisis/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-id-card c-sidebar-nav-icon">

                    </i>
                    Rekognisi
                </a>
            </li>
        @endcan
        @if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}"
                        href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        Ganti Password
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link"
                onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                Keluar
            </a>
        </li>
    </ul>

</div>

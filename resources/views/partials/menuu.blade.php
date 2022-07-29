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
            <a href="{{ route('frontend.home') }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                Dashboard
            </a>
        </li>
        @can('profil_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is('frontend/biodata*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                    </i>
                    Profil
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('biodatum_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('frontend.biodata.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('frontend/biodata') || request()->is('frontend/biodata/*') ? 'c-active' : '' }}">
                                Data Diri
                            </a>
                        </li>
                    @endcan
                    @can('impasing_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('frontend.impasings.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('frontend/impasings') || request()->is('frontend/impasings/*') ? 'c-active' : '' }}">
                                Inpassing
                            </a>
                        </li>
                    @endcan
                    @can('jafung_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('frontend.jafungs.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('frontend/jafungs') || request()->is('frontend/jafungs/*') ? 'c-active' : '' }}">
                                Jabatan Fungsional
                            </a>
                        </li>
                    @endcan
                    @can('kepangkatan_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('frontend.kepangkatans.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('frontend/kepangkatans') || request()->is('frontend/kepangkatans/*') ? 'c-active' : '' }}">
                                Kepangkatan
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('kualifikasi_access')
            <li
                class="c-sidebar-nav-dropdown {{ request()->is('frontend/pendidikans*') ? 'c-show' : '' }} {{ request()->is('frontend/diklats*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-graduation-cap c-sidebar-nav-icon">

                    </i>
                    Kualifikasi
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('pendidikan_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('frontend.pendidikans.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('frontend/pendidikans') || request()->is('frontend/pendidikans/*') ? 'c-active' : '' }}">
                                Pendidikan Formal
                            </a>
                        </li>
                    @endcan
                    @can('diklat_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('frontend.diklats.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('frontend/diklats') || request()->is('frontend/diklats/*') ? 'c-active' : '' }}">
                                Diklat
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('kompetensi_access')
            <li
                class="c-sidebar-nav-dropdown {{ request()->is('frontend/sertifikasis*') ? 'c-show' : '' }} {{ request()->is('frontend/sertifikasiprofs*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-user-graduate c-sidebar-nav-icon">

                    </i>
                    Kompetensi
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('sertifikasi_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('frontend.sertifikasis.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('frontend/sertifikasis') || request()->is('frontend/sertifikasis/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                Sertifikasi Dosen
                            </a>
                        </li>
                    @endcan
                    @can('sertifikasiprof_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('frontend.sertifikasiprofs.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('frontend/sertifikasiprofs') || request()->is('frontend/sertifikasiprofs/*') ? 'c-active' : '' }}">
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
                <a href="{{ route('frontend.studis.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('frontend/studis') || request()->is('frontend/studis/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-address-book c-sidebar-nav-icon">

                    </i>
                    Studi Lanjut
                </a>
            </li>
        @endcan
        @can('rekognisi_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('frontend.rekognisis.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('frontend/rekognisis') || request()->is('frontend/rekognisis/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-id-card c-sidebar-nav-icon">

                    </i>
                    Rekognisi
                </a>
            </li>
        @endcan
        @can('peningkatan_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("frontend.peningkatans.index") }}" class="c-sidebar-nav-link {{ request()->is("frontend/peningkatans") || request()->is("frontend/peningkatans/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-user-graduate c-sidebar-nav-icon">

                    </i>
                    Peningkatan Kompetensi Dosen
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
            <a type="button" class="c-sidebar-nav-link" data-coreui-toggle="modal" data-coreui-target="#exampleModal">
                <i class="fas fa-calendar c-sidebar-nav-icon"></i>
                Filter Tahun
            </a>
        </li>
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

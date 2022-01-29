<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                    data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button"
                class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Menu</li>
                @if ( Auth::user()->role == 1)
                    <li>
                        {{-- <a href="dashboard" class="mm-active"> --}}
                            <a href="dashboard" class="{{  request()->is('admin.dashboard') ? 'mm-active' : '' }}">
                            <i class="metismenu-icon pe-7s-rocket"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="metismenu-icon pe-7s-diamond"></i>
                            Data Master
                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="bahan">
                                    <i class="metismenu-icon"></i>
                                    Data Bahan
                                </a>
                            </li>
                            <li>
                                <a href="ukuran">
                                    <i class="metismenu-icon">
                                    </i>Data Ukuran
                                </a>
                            </li>
                            <li>
                                <a href="layanan">
                                    <i class="metismenu-icon">
                                    </i>Data Layanan
                                </a>
                            </li>
                            <li>
                                <a href="kelurahan">
                                    <i class="metismenu-icon">
                                    </i>Data Kelurahan
                                </a>
                            </li>
                            <li>
                                <a href="kecamatan">
                                    <i class="metismenu-icon">
                                    </i>Data Kecamatan
                                </a>
                            </li>
                            <li>
                                <a href="kota">
                                    <i class="metismenu-icon">
                                    </i>Data Kota
                                </a>
                            </li>
                            <li>
                                <a href="provinsi">
                                    <i class="metismenu-icon">
                                    </i>Data Provinsi
                                </a>
                            </li>
                            <li>
                                <a href="jabatan">
                                    <i class="metismenu-icon">
                                    </i>Data Jabatan
                                </a>
                            </li>
                            <li>
                                <a href="pelanggan">
                                    <i class="metismenu-icon">
                                    </i>Data Pelanggan
                                </a>
                            </li>
                            <li>
                                <a href="pegawai">
                                    <i class="metismenu-icon">
                                    </i>Data pegawai
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- <li>
                        <a href="pelanggan">
                            <i class="metismenu-icon pe-7s-display2"></i>
                            Pelanggan
                        </a>
                    </li> --}}
                    <li>
                        <a href="pesan">
                            <i class="metismenu-icon pe-7s-display2"></i>
                            Pemesanan
                        </a>
                    </li>
                    <li>
                        <a href="bayar">
                            <i class="metismenu-icon pe-7s-display2"></i>
                            Pembayaran
                        </a>
                    </li>
                    {{-- <li>
                        <a href="pegawai">
                            <i class="metismenu-icon pe-7s-display2"></i>
                            Pegawai
                        </a>
                    </li> --}}
                
                    
                @else
                <li>
                    <a href="dashboard" class="mm-active">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="pesanUser">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        Pemesanan
                    </a>
                </li>
                <li>
                    <a href="bayarUser">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        Pembayaran
                    </a>
                </li>
                @endif
                
            </ul>
        </div>
    </div>
</div>
<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Brand-->
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <!--begin::Logo-->
        @if (auth()->check())
            @if (auth()->user()->is_admin == 1)
            <a href="{{ url('adminDashboard') }}">
                <img alt="Logo" src="assets/media/logos/whiteprimakara.png" class="h-40px logo" />
            </a>
            @elseif (auth()->user()->is_admin == 0)
            <a href="{{ url('userDashboard') }}">
                <img alt="Logo" src="assets/media/logos/whiteprimakara.png" class="h-40px logo" />
            </a>
            @endif
        @else
        <a href="{{ url('login') }}">
            <img alt="Logo" src="assets/media/logos/whiteprimakara.png" class="h-40px logo" />
        </a>
        @endif
        <!--end::Logo-->
        <!--begin::Aside toggler-->
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
            <span class="svg-icon svg-icon-1 rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="black" />
                    <path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Aside toggler-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">

                @if (auth()->check())
                    @if (auth()->user()->is_admin == 1)
                        <div class="menu-item">
                            <div class="menu-content pb-2">
                                <span class="menu-section text-muted text-uppercase fs-8 ls-1">Dashboard</span>
                            </div>
                        </div>
                        <div class="menu-item {{ ($active === "Dashboard Admin") ? 'here show' : '' }}">
                            <a class="menu-link" href="{{ url('adminDashboard') }}">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                    <span class="menu-bullet">
                                        <i class="bi bi-house fs-3"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <div class="menu-content pt-8 pb-2">
                                <span class="menu-section text-muted text-uppercase fs-8 ls-1">Main Menu</span>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art009.svg-->
                                    <span class="menu-bullet">
                                        <i class="bi bi-envelope fs-3"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title">Request Surat Mahasiswa</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                <div class="menu-item {{ ($active === "Surat Magang MBKM") ? 'here show' : '' }}">
                                    <a class="menu-link" href="{{ url('suratMbkm') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Surat Permohonan Magang MBKM</span>
                                    </a>
                                </div>
                                <div class="menu-item {{ ($active === "Surat Survey Matakuliah") ? 'here show' : '' }}">
                                    <a class="menu-link" href="{{ url('suratSurveyMatkul') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Surat Izin Survey Matakuliah</span>
                                    </a>
                                </div>
                                <div class="menu-item {{ ($active === "Surat Keterangan Kuliah") ? 'here show' : '' }}">
                                    <a class="menu-link" href="{{ url('suratKeteranganKuliah') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Surat Keterangan Aktif Kuliah</span>
                                    </a>
                                </div>
                                <div class="menu-item {{ ($active === "Surat Izin Survei Proposal Skripsi") ? 'here show' : '' }}">
                                    <a class="menu-link" href="{{ url('suratSurveyProposal') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Surat Izin Survei Proposal Skripsi</span>
                                    </a>
                                </div>
                                <div class="menu-item {{ ($active === "Surat Izin Survei Skripsi") ? 'here show' : '' }}">
                                    <a class="menu-link" href="{{ url('suratSurveySkripsi') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Surat Izin Survei Skripsi</span>
                                    </a>
                                </div>
                                <div class="menu-item {{ ($active === "Surat Permohonan Permintaan Data") ? 'here show' : '' }}">
                                    <a class="menu-link" href="{{ url('suratPermohonanData') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Surat Permohonan Permintaan Data</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item">
                            <div class="menu-content pt-8 pb-2">
                                <span class="menu-section text-muted text-uppercase fs-8 ls-1">Menu Informasi</span>
                            </div>
                        </div>
                        <div class="menu-item {{ ($active === "Pedoman") ? 'here show' : '' }}">
                            <a class="menu-link" href="{{ url('pedoman') }}">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
                                    <span class="menu-bullet">
                                        <i class="bi bi-book-fill fs-3"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title">Pedoman</span>
                            </a>
                        </div>

                        <div class="menu-item {{ ($active === "Pengumuman") ? 'here show' : '' }}">
                            <a class="menu-link" href="{{ url('pengumuman') }}">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
                                    <span class="menu-bullet">
                                        <i class="bi bi-megaphone fs-3"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title">Pengumuman</span>
                            </a>
                        </div>

                        <div class="menu-item {{ ($active === "Panduan") ? 'here show' : '' }}">
                            <a class="menu-link" href="{{ url('panduan') }}">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
                                    <span class="menu-bullet">
                                        <i class="bi bi-compass fs-3"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title">Panduan</span>
                            </a>
                        </div>


                        <div class="menu-item">
                            <div class="menu-content pt-8 pb-2">
                                <span class="menu-section text-muted text-uppercase fs-8 ls-1">Master</span>
                            </div>
                        </div>
                        <div class="menu-item {{ ($active === "Akun") ? 'here show' : '' }}">
                            <a class="menu-link" href="{{ url('akun') }}">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
                                    <span class="menu-bullet">
                                        <i class="bi bi-person fs-3"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title">Akun</span>
                            </a>
                        </div>

                        <div class="menu-item {{ ($active === "Biodata") ? 'here show' : '' }}">
                            <a class="menu-link" href="{{ url('biodata') }}">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
                                    <span class="menu-bullet">
                                        <i class="bi bi-person-bounding-box fs-3"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title">Biodata</span>
                            </a>
                        </div>

                        <div class="menu-item {{ ($active === "Dosen PA") ? 'here show' : '' }}">
                            <a class="menu-link" href="{{ url('dosenPA') }}">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
                                    <span class="menu-bullet">
                                        <i class="bi bi-people-fill fs-3"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title">Dosen PA</span>
                            </a>
                        </div>

                        <div class="menu-item {{ ($active === "Kaprodi") ? 'here show' : '' }}">
                            <a class="menu-link" href="{{ url('kaprodi') }}">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
                                    <span class="menu-bullet">
                                        <i class="bi bi-building fs-3"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title">Kaprodi</span>
                            </a>
                        </div>

                        <div class="menu-item {{ ($active === "Penanda Tangan") ? 'here show' : '' }}">
                            <a class="menu-link" href="{{ url('penandaTangan') }}">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
                                    <span class="menu-bullet">
                                        <i class="bi bi-hand-index fs-3"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title">Penanda Tangan</span>
                            </a>
                        </div>

                        <div class="menu-item {{ ($active === "Jenis Panduan") ? 'here show' : '' }}">
                            <a class="menu-link" href="{{ url('jenisPanduan') }}">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
                                    <span class="menu-bullet">
                                        <i class="bi bi-list-ul fs-3"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title">Jenis Panduan</span>
                            </a>
                        </div>
                    @endif

                    @if (auth()->user()->is_admin == 0)
                        <div class="menu-item">
                            <div class="menu-content pb-2">
                                <span class="menu-section text-muted text-uppercase fs-8 ls-1">Dashboard</span>
                            </div>
                        </div>
                        <div class="menu-item {{ ($active === "Dashboard User") ? 'here show' : '' }}">
                            <a class="menu-link" href="{{ url('userDashboard') }}">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                    <span class="menu-bullet">
                                        <i class="bi bi-house fs-3"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <div class="menu-content pt-8 pb-2">
                                <span class="menu-section text-muted text-uppercase fs-8 ls-1">Surat</span>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" class="menu-item {{ ($section === "Surat Diproses Sendiri") ? 'here show' : '' }} menu-accordion">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art009.svg-->
                                    <span class="svg-icon svg-icon-2"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Communication/Mail.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title">Surat Diproses Sendiri</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                <div class="menu-item">
                                    <a class="menu-link {{ ($active === "Surat Izin Absensi") ? 'active' : '' }} " href="{{ url('createSuratIzinAbsensi') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Surat Izin Absensi</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link {{ ($active === "Surat Cuti Akademik") ? 'active' : '' }} " href="{{ url('createSuratCutiAkademik') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Surat Permohonan Cuti Akademik</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link {{ ($active === "Surat Pengunduran Diri") ? 'active' : '' }} " href="{{ url('createSuratMengundurkanDiri') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Surat Permohonan Mengundurkan Diri</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link {{ ($active === "Surat Pindah Kelas") ? 'active' : '' }} " href="{{ url('createSuratPindahKelas') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Surat Permohonan Pindah Kelas</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                        <a class="menu-link {{ ($active === "Surat Pindah Prodi") ? 'active' : '' }} " href="{{ url('createSuratPindahProdi') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Surat Permohonan Pindah Prodi</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div data-kt-menu-trigger="click" class="menu-item {{ ($section === "Surat Dibantu FO") ? 'here show' : '' }} menu-accordion">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art009.svg-->
                                    <span class="svg-icon svg-icon-2"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Communication/Mail.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title">Surat Dibantu FO</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                <div class="menu-item {{ ($active === "Surat Magang MBKM") ? 'here show' : '' }}">
                                    <a class="menu-link" href="{{ url('userSuratMagangMBKM') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Surat Permohonan Magang MBKM</span>
                                    </a>
                                </div>
                                <div class="menu-item {{ ($active === "Surat Survey Matakuliah") ? 'here show' : '' }}">
                                    <a class="menu-link" href="{{ url('userSuratSurveyMatkul') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Surat Izin Survey Matakuliah</span>
                                    </a>
                                </div>
                                <div class="menu-item {{ ($active === "Surat Keterangan Aktif Kuliah") ? 'here show' : '' }}">
                                    <a class="menu-link" href="{{ url('userSuratKetKuliah') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Surat Keterangan Aktif Kuliah</span>
                                    </a>
                                </div>
                                <div class="menu-item {{ ($active === "Surat Survey Proposal Skripsi") ? 'here show' : '' }}">
                                    <a class="menu-link" href="{{ url('userSuratSurveyProposal') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Surat Izin Survey Proposal Skripsi</span>
                                    </a>
                                </div>
                                <div class="menu-item {{ ($active === "Surat Survey Skripsi") ? 'here show' : '' }}">
                                    <a class="menu-link" href="{{ url('userSuratSurveySkripsi') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Surat Izin Survey Skripsi</span>
                                    </a>
                                </div>
                                <div class="menu-item {{ ($active === "Surat Permohonan Data") ? 'here show' : '' }}">
                                    <a class="menu-link" href="{{ url('userSuratPermohonanData') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Surat Permohonan Permintaan Data</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item">
                            <div class="menu-content pt-8 pb-2">
                                <span class="menu-section text-muted text-uppercase fs-8 ls-1">Menu</span>
                            </div>
                        </div>

                        <div class="menu-item {{ ($active === "Pedoman") ? 'here show' : '' }}">
                            <a class="menu-link" href="{{ url('userPedoman') }}">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                    <span class="menu-bullet">
                                        <i class="bi bi-book-fill fs-3"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title">Pedoman</span>
                            </a>
                        </div>
                        <div class="menu-item {{ ($active === "Pusat Informasi Akademik") ? 'here show' : '' }}">
                            <a class="menu-link" href="{{ url('userPusatInformasiAkademik') }}">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                    <span class="menu-bullet">
                                        <i class="bi bi-info-circle fs-3"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title">Pusat Informasi Akademik</span>
                            </a>
                        </div>
                    @endif
                @else
                <div class="menu-item">
                    <div class="menu-content pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">DALA Primakara</span>
                    </div>
                </div>
                <div class="menu-item here show">
                    <a class="menu-link" href="{{ url('login') }}">
                        <span class="menu-title">Academic Administration System of Primakara</span>
                    </a>
                </div>
                @endif

            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->
    <!--begin::Footer-->
    <div class="aside-footer flex-column-auto pt-5 pb-7 px-5" id="kt_aside_footer">
        <span class="btn btn-custom btn-primary w-100" data-bs-toggle="tooltip">
            <span class="btn-label">©2024 Primakara</span>
            <!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
            <span class="svg-icon btn-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM15 17C15 16.4 14.6 16 14 16H8C7.4 16 7 16.4 7 17C7 17.6 7.4 18 8 18H14C14.6 18 15 17.6 15 17ZM17 12C17 11.4 16.6 11 16 11H8C7.4 11 7 11.4 7 12C7 12.6 7.4 13 8 13H16C16.6 13 17 12.6 17 12ZM17 7C17 6.4 16.6 6 16 6H8C7.4 6 7 6.4 7 7C7 7.6 7.4 8 8 8H16C16.6 8 17 7.6 17 7Z" fill="black" />
                    <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </span>
    </div>
    <!--end::Footer-->
</div>

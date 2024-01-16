@extends('layouts.main')

@section('content')
	<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Toolbar-->
                        @include('partials.toolbar')
                        <!--end::Toolbar-->
						<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
                                <!--begin::Card-->
                                <div class="card">
                                    <!--begin::Card body-->
                                    <div class="card-body pb-5">
                                        <!--begin::Heading-->
                                        <div class="card-px pt-10 d-flex justify-content-between">
                                            <!--begin::Title-->
                                                <div class="d-inline mt-2">
                                                    <h2 class="fs-2x fw-bolder mb-0">Master {{ $title }}</h2>
                                                </div>
                                                <div class="d-inline">
                                                    <a href="#" class="btn btn-sm btn-primary fs-6" data-bs-toggle="modal" data-bs-target="#kt_modal_new_akun">Tambah</a>
                                                    <a href="{{ route('download.example.excel') }}" class="btn btn-sm btn-secondary">Download Contoh Excel</a>
                                                </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Import Form-->
                                        <div class="card-px mt-10 mt-5">
                                            <h3 class="fs-4 fw-bolder mb-4">Import Data Excel</h3>
                                            <form action="{{ route('import.biodata') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="excel_file" class="form-label">Pilih File Excel:</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" name="excel_file" id="excel_file" accept=".xls, .xlsx">
                                                        <div style="margin-left: 10px;"> <!-- Tambahkan margin di sini -->
                                                            <button type="submit" class="btn btn-primary">Import Data</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            @if (session('importSuccess'))
                                                <div class="alert alert-success mt-4">
                                                    {{ session('importSuccess') }}
                                                </div>
                                            @endif

                                            @if (session('importError'))
                                                <div class="alert alert-danger mt-4">
                                                    {{ session('importError') }}
                                                </div>
                                            @endif

                                            @if (session('importErrors'))
                                                <div class="alert alert-danger mt-4">
                                                    <ul>
                                                        @foreach(session('importErrors') as $errorMessage)
                                                            <li>{{ $errorMessage }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            @if (session('importValidationFailures'))
                                                <div class="alert alert-danger mt-4">
                                                    <p>Detail Kesalahan:</p>
                                                    <ul>
                                                        @foreach(session('importValidationFailures') as $failure)
                                                            <li>Baris: {{ $failure->row() }}, Kolom: {{ $failure->attribute() }}, Pesan: {{ implode(', ', $failure->errors()) }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                        <!--End::Import Form-->
                                        <!-- Tampilan Search -->
                                        <div class="card-px mt-5">
                                            <form action="{{ route('biodata') }}" method="GET">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="search" placeholder="Search biodata Mahasiswa" value="{{ request('search') }}">
                                                    <div style="margin-left: 10px;">
                                                        <button type="submit" class="btn btn-success" style="width: 130px;">Search</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- End Tampilan Search -->
                                        <!-- Tampilan Filter -->
                                        <div class="card-px mt-5">
                                            <form action="{{ route('biodata') }}" method="GET" class="mb-3">
                                                <div class="input-group">
                                                    <!-- Filter Kelas -->
                                                    <div class="input-group-append" style="width: 185px;">
                                                        <select class="form-control" name="kelas">
                                                            <option value="">Filter by Kelas</option>
                                                            <option value="Pagi"{{ request('kelas') == 'Pagi' ? ' selected' : '' }}>Pagi</option>
                                                            <option value="Malam"{{ request('kelas') == 'Malam' ? ' selected' : '' }}>Malam</option>
                                                        </select>
                                                    </div>
                                                    <!-- Filter Kelas -->

                                                    <!-- Filter Prodi -->
                                                    <div class="input-group-append" style="margin-left: 5px; width: 185px;">
                                                        <select class="form-control" name="prodi">
                                                            <option value="">Filter by Prodi</option>
                                                            <option value="Informatika"{{ request('prodi') == 'Informatika' ? ' selected' : '' }}>Informatika</option>
                                                            <option value="Sistem Informasi"{{ request('prodi') == 'Sistem Informasi' ? ' selected' : '' }}>Sistem Informasi</option>
                                                            <option value="Sistem Informasi Akutansi"{{ request('prodi') == 'Sistem Informasi Akutansi' ? ' selected' : '' }}>Sistem Informasi Akutansi</option>
                                                            <option value="DKV"{{ request('prodi') == 'DKV' ? ' selected' : '' }}>DKV</option>
                                                            <option value="Manajemen"{{ request('prodi') == 'Manajemen' ? ' selected' : '' }}>Manajemen</option>
                                                            <option value="Akutansi"{{ request('prodi') == 'Akutansi' ? ' selected' : '' }}>Akutansi</option>
                                                            <option value="Bisnis Digital"{{ request('prodi') == 'Bisnis Digital' ? ' selected' : '' }}>Bisnis Digital</option>
                                                        </select>
                                                    </div>

                                                    <!-- Filter Fakultas -->
                                                    <div class="input-group-append" style="margin-left: 5px; width: 185px;">
                                                        <select class="form-control" name="fakultas">
                                                            <option value="">Filter by Fakultas</option>
                                                            <option value="Teknologi Informasi & Desain"{{ request('fakultas') == 'Teknologi Informasi & Desain' ? ' selected' : '' }}>Teknologi Informasi & Desain</option>
                                                            <option value="Ekonomi & Bisnis"{{ request('fakultas') == 'Ekonomi & Bisnis' ? ' selected' : '' }}>Ekonomi & Bisnis</option>
                                                        </select>
                                                    </div>

                                                    <!-- Filter Angkatan -->
                                                    <div class="input-group-append" style="margin-left: 5px; width: 185px;">
                                                        <select class="form-control" name="angkatan">
                                                            <option value="">Filter by Angkatan</option>
                                                            @foreach($angkatanOptions as $angkatan)
                                                                <option value="{{ $angkatan }}"{{ request('angkatan') == $angkatan ? ' selected' : '' }}>{{ $angkatan }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <!-- Filter Dosen PA -->
                                                    <div class="input-group-append" style="margin-left: 5px; width: 240px;">
                                                        <select class="form-control" name="dosen_pa">
                                                            <option value="">Filter by Dosen PA</option>
                                                            @foreach($dosenPAs as $dosenPA)
                                                                <option value="{{ $dosenPA->id }}"{{ request('dosen_pa') == $dosenPA->id ? ' selected' : '' }}>{{ $dosenPA->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div style="margin-left: 10px;">
                                                        <button type="submit" class="btn btn-danger" style="width: 130px;">Filter</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- End Tampilan Filter -->
                                        <!--begin::Table-->
                                        @if ($biodatas->count() > 0)
                                        <div class="table-responsive my-10 mx-8">
                                            <table class="table table-striped gy-7 gs-7">
                                                <thead>
                                                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                                        <th class="min-w-200px">Action</th>
                                                        <th class="min-w-50px">No</th>
                                                        <th class="min-w-100px">Nim</th>
                                                        <th class="min-w-100px">Nama</th>
                                                        <th class="min-w-100px">Kelas</th>
                                                        <th class="min-w-100px">Prodi</th>
                                                        <th class="min-w-100px">Fakultas</th>
                                                        <th class="min-w-100px">Angkatan</th>
                                                        <th class="min-w-100px">Tempat Lahir</th>
                                                        <th class="min-w-100px">Tanggal Lahir</th>
                                                        <th class="min-w-100px">Dosen PA</th>
                                                        <th class="min-w-100px">Alamat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($biodatas as $item)
                                                    <tr>
                                                        <td>
                                                            <a href="{{ route('edit.biodata', $item->id ) }}" class="btn btn-sm btn-primary btn-action" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                            <form id="form-delete" action="{{ route('destroy.biodata', $item->id ) }}" method="POST"
                                                            class="d-inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button id="submit-btn" type="submit" data-toggle="tooltip" data-original-title="Hapus bagian"
                                                                class="btn btn-sm btn-danger btn-action" onclick="confirmDelete(event)"
                                                                ><i class="fas fa-trash"></i></i></button>
                                                            </form>
                                                        </td>
                                                        <td>{{ ($biodatas->currentPage() - 1) * $biodatas->perPage() + $loop->index + 1 }}</td>
                                                        <td>{{ $item->nim }}</td>
                                                        <td>{{ $item->nama }}</td>
                                                        <td>{{ $item->kelas }}</td>
                                                        <td>{{ $item->prodi }}</td>
                                                        <td>{{ $item->fakultas }}</td>
                                                        <td>{{ $item->angkatan }}</td>
                                                        <td>{{ $item->tempat_lahir }}</td>
                                                        <td>{{ $item->tgl_lahir }}</td>
                                                        <td>{{ $item->dosenPA->nama }}</td>
                                                        <td>{{ $item->alamat }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- Pagination Links -->
                                        {{ $biodatas->links() }}
                                        @else
                                        <div class="my-10 mx-15">
                                            <!--begin::Notice-->
                                            <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                                                <!--begin::Icon-->
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                                                <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="black" />
                                                        <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <!--end::Icon-->
                                                <!--begin::Wrapper-->
                                                <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                                    <!--begin::Content-->
                                                    <div class="mb-3 mb-md-0 fw-bold">
                                                        <h4 class="text-gray-900 fw-bolder">Belum ada data</h4>
                                                        <div class="fs-6 text-gray-700 pe-7">Belum ada data yang diinputkan</div>
                                                    </div>
                                                    <!--end::Content-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Notice-->
                                        </div>
                                        @endif
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                                <!--begin::Modal-->
                                <div class="modal fade" id="kt_modal_new_akun" tabindex="-1" aria-hidden="true">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog modal-dialog-centered mw-650px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content">
                                            <!--begin::Modal header-->
                                            <div class="modal-header">
                                                <!--begin::Modal title-->
                                                <h2>Tambah {{ $title }}</h2>
                                                <!--end::Modal title-->
                                                <!--begin::Close-->
                                                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                    <span class="svg-icon svg-icon-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </div>
                                                <!--end::Close-->
                                            </div>
                                            <!--end::Modal header-->
                                            <!--begin::Modal body-->
                                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                                <!--begin::Form-->
                                                <form action="{{ route('insert.biodata') }}" method="POST">
                                                    @csrf
                                                    <!--begin::Input group-->
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="required">Nim</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input class="form-control form-control-solid" type="text" name="nim" required value=""/>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="required">Nama</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input class="form-control form-control-solid" type="text" name="nama" required value=""/>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="required">Kelas</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="kelas" required>
                                                            <option value="Pagi">Pagi</option>
                                                            <option value="Malam">Malam</option>
                                                        </select>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="required">Prodi</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="prodi" required>
                                                            <option value="Informatika">Informatika</option>
                                                            <option value="Sistem Informasi">Sistem Informasi</option>
                                                            <option value="Sistem Informasi Akutansi">Sistem Informasi Akutansi</option>
                                                            <option value="Akutansi">Akutansi</option>
                                                            <option value="Manajemen">Manajemen</option>
                                                            <option value="DKV">DKV</option>
                                                            <option value="Bisnis Digital">Bisnis Digital</option>
                                                        </select>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="required">Fakultas</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="fakultas" required>
                                                            <option value="Teknologi Informasi & Desain">Teknologi Informasi & Desain</option>
                                                            <option value="Ekonomi & Bisnis">Ekonomi & Bisnis</option>
                                                        </select>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="required">Angkatan</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input class="form-control form-control-solid" type="text" name="angkatan" required value=""/>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="required">Tempat Lahir</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input class="form-control form-control-solid" type="text" name="tempat_lahir" required value=""/>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="required">Tanggal Lahir</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input class="form-control form-control-solid" type="date" name="tgl_lahir" required value=""/>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="required">ALamat</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input class="form-control form-control-solid" type="text" name="alamat" required value=""/>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="required">Dosen PA</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <select class="form-control form-control-solid" name="dosen_pa" data-control="select2" data-dropdown-parent="#kt_modal_new_akun" required>
                                                            <option value="">Pilih Dosen PA</option>
                                                            @foreach ($dosenPAs as $dosenPA)
                                                                <option value="{{ $dosenPA->id }}">{{ $dosenPA->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Actions-->
                                                    <div class="text-center pt-15">
                                                        <button type="reset" data-bs-dismiss="modal" class="btn btn-light me-3">Cancel</button>
                                                        <button type="submit" onclick="submitForm(this)" class="btn btn-primary">
                                                            <span class="indicator-label">Submit</span>
                                                        </button>
                                                    </div>
                                                    <!--end::Actions-->
                                                </form>
                                                <!--end::Form-->
                                            </div>
                                            <!--end::Modal body-->
                                        </div>
                                        <!--end::Modal content-->
                                    </div>
                                    <!--end::Modal dialog-->
                                </div>
                                <!--end::Modal-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->
					</div>
                    <script>
                        function confirmDelete(event) {
                            event.preventDefault(); // Menghentikan tindakan penghapusan asli
                            if (confirm("Apakah Anda yakin ingin menghapus?")) {
                                // Jika pengguna menekan OK dalam konfirmasi, lanjutkan dengan penghapusan
                                event.target.form.submit();
                            }
                        }
                        function submitForm(button) {
                            button.disabled = true;
                                    button.innerHTML = 'Submitting...';

                                    // Mencegah pengiriman berulang
                                    button.form.submit();
                        }
                    </script>
@endsection

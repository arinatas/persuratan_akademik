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
                                                    <h2 class="fs-2x fw-bolder mb-0">{{ $title }}</h2>
                                                </div>
                                                <div class="d-inline">
                                                    <a href="#" class="btn btn-sm btn-primary fs-6" data-bs-toggle="modal" data-bs-target="#kt_modal_new_akun" style="width: 130px;">Tambah</a>
                                                </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Heading-->
                                        <!-- Tampilan Filter -->
                                        <div class="card-px mt-5">
                                            <form action="{{ route('pengumuman') }}" method="GET" class="mb-3">
                                                <div class="input-group">
                                                    <!-- Filter Kelas -->
                                                    <div class="input-group-append" style="width: 185px;">
                                                        <select class="form-control" name="status_pin">
                                                            <option value="">Filter by Disematkan</option>
                                                            <option value="0"{{ request('status_pin') == '0' ? ' selected' : '' }}>Tidak Disematkan</option>
                                                            <option value="1"{{ request('status_pin') == '1' ? ' selected' : '' }}>Disematkan</option>
                                                        </select>
                                                    </div>
                                                    <!-- Filter Kelas -->

                                                    <!-- Filter Tanggal -->
                                                    <div style="margin-left: 10px;">
                                                        <input type="date" class="form-control" name="start_date" value="{{ request('start_date') }}" placeholder="Start Date">
                                                    </div>
                                                    <div style="margin-left: 10px;">
                                                        <input type="date" class="form-control" name="end_date" value="{{ request('end_date') }}" placeholder="End Date">
                                                    </div>
                                                    <!-- End Filter Tanggal -->

                                                    <div style="margin-left: 10px;">
                                                        <button type="submit" class="btn btn-danger" style="width: 130px;">Filter</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- End Tampilan Filter -->
                                        <!-- Tampilan Search -->
                                        <div class="card-px mt-5">
                                            <form action="{{ route('pengumuman') }}" method="GET">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="search" placeholder="Search Pengumuman Berdasarkan Judul / Deskripsi" value="{{ request('search') }}">
                                                    <div style="margin-left: 10px;">
                                                        <button type="submit" class="btn btn-success" style="width: 130px;">Search</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- End Tampilan Search -->
                                        <!--begin::Table-->
                                        @if ($pengumumans )
                                        <div class="table-responsive my-10 mx-8">
                                            <table class="table table-striped gy-7 gs-7">
                                                <thead>
                                                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                                        <th class="min-w-100px">No</th>
                                                        <th class="min-w-100px">Judul</th>
                                                        <th class="min-w-100px">Tanggal Terbit</th>
                                                        <th class="min-w-100px">File Pengumuman</th>
                                                        <th class="min-w-100px">Status</th>
                                                        <th class="min-w-300px">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pengumumans as $item)
                                                    <tr>
                                                        <td>{{ $pengumumans->firstItem() + $loop->index }}</td>
                                                        <td>{{ $item->judul }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($item->tgl_terbit)->format('d F Y') }}</td>
                                                        <td>
                                                            @if ($item->nama_file)
                                                                <a href="{{ asset('storage/' . $item->nama_file) }}" target="_blank">
                                                                    <i class="fas fa-eye"></i> View PDF
                                                                </a>
                                                            @else
                                                                No File Available
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($item->status_pin == 0)
                                                                <span class="badge bg-danger text-dark">
                                                                    <i class="bi bi-clock"></i> Tidak Disematkan
                                                                </span>
                                                            @elseif($item->status_pin == 1)
                                                                <span class="badge bg-success">
                                                                    <i class="bi bi-check-circle"></i> Disematkan
                                                                </span>
                                                            @else
                                                                <span class="badge bg-secondary">Undefined</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('edit.pengumuman', $item->id ) }}" class="btn btn-sm btn-primary btn-action" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                            <form id="form-delete" action="{{ route('destroy.pengumuman', $item->id ) }}" method="POST"
                                                            class="d-inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button id="submit-btn" type="submit" data-toggle="tooltip" data-original-title="Hapus bagian"
                                                                class="btn btn-sm btn-danger btn-action" onclick="confirmDelete(event)"
                                                                ><i class="fas fa-trash"></i></i></button>
                                                            </form>
                                                            <button class="btn btn-sm btn-info btn-action" data-bs-toggle="modal" data-bs-target="#detailModal{{ $item->id }}" title="Detail Pengumuman"><i class="fas fa-info-circle"></i>
                                                            </button>
                                                            <!-- Modals Detail-->
                                                            <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered mw-850px">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h2>Detail {{ $title }}</h2>
                                                                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                                                                <span class="svg-icon svg-icon-1">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                                                                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                                                                    </svg>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <!--begin::Modal body-->
                                                                        <div class="modal-body scroll-y mx-xl-8">
                                                                            <!--begin::content modal body-->
                                                                            <div class="table-responsive my-10 mx-8">
                                                                                <table class="table table-striped gy-7 gs-7">
                                                                                <tr>
                                                                                    <th>Judul</th>
                                                                                    <td>{{ $item->judul }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Tanggal Awal</th>
                                                                                    <td>{{ \Carbon\Carbon::parse($item->tgl_awal)->format('d F Y') }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Tanggal Akhir</th>
                                                                                    <td>{{ \Carbon\Carbon::parse($item->tgl_akhir)->format('d F Y') }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Status Pin Pengumuman</th>
                                                                                    <td>
                                                                                        @if($item->status_pin == 0)
                                                                                            <span class="badge bg-danger text-dark">
                                                                                                <i class="bi bi-clock"></i> Tidak Disematkan
                                                                                            </span>
                                                                                        @elseif($item->status_pin == 1)
                                                                                            <span class="badge bg-success">
                                                                                                <i class="bi bi-check-circle"></i> Disematkan
                                                                                            </span>
                                                                                        @else
                                                                                            <span class="badge bg-secondary">Undefined</span>
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Tanggal Terbit</th>
                                                                                    <td>{{ \Carbon\Carbon::parse($item->tgl_terbit)->format('d F Y') }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    @if($item->desc1)
                                                                                        <th>Paragraf 1</th>
                                                                                        <td>{{ $item->desc1 }}</td>
                                                                                    @endif
                                                                                </tr>
                                                                                <tr>
                                                                                    @if($item->desc2)
                                                                                        <th>Paragraf 2</th>
                                                                                        <td>{{ $item->desc2 }}</td>
                                                                                    @endif
                                                                                </tr>
                                                                                <tr>
                                                                                    @if($item->desc3)
                                                                                        <th>Paragraf 3</th>
                                                                                        <td>{{ $item->desc3 }}</td>
                                                                                    @endif
                                                                                </tr>
                                                                                <tr>
                                                                                    @if($item->desc4)
                                                                                        <th>Paragraf 4</th>
                                                                                        <td>{{ $item->desc4 }}</td>
                                                                                    @endif
                                                                                </tr>
                                                                                <tr>
                                                                                    @if($item->desc5)
                                                                                        <th>Paragraf 5</th>
                                                                                        <td>{{ $item->desc5 }}</td>
                                                                                    @endif
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Gambar Pengumuman</th>
                                                                                    <td>
                                                                                        @php
                                                                                            $extension = pathinfo($item->gambar, PATHINFO_EXTENSION);
                                                                                        @endphp
                                                                                        @if ($item->gambar)
                                                                                            @if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']))
                                                                                                {{-- Display image --}}
                                                                                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Pengumuman" style="width: 450px; height: auto;">
                                                                                                <button onclick="deleteImage('{{ $item->id }}', 'gambar')" class="btn btn-danger btn-sm mt-2">Hapus Gambar</button>
                                                                                            @else
                                                                                                {{-- Handle other file types --}}
                                                                                                <p>File type not supported</p>
                                                                                            @endif
                                                                                        @else
                                                                                            No File Available
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>File Pengumuman</th>
                                                                                    <td>
                                                                                        @php
                                                                                            $extension = pathinfo($item->nama_file, PATHINFO_EXTENSION);
                                                                                        @endphp
                                                                                        @if ($item->nama_file)
                                                                                            @if (in_array(strtolower($extension), ['pdf']))
                                                                                                {{-- Display PDF --}}
                                                                                                <a href="{{ asset('storage/' . $item->nama_file) }}" target="_blank">View PDF</a>
                                                                                                <button onclick="deleteFile('{{ $item->id }}')" class="btn btn-danger btn-sm mt-2">Hapus File</button>
                                                                                            @else
                                                                                                {{-- Handle other file types --}}
                                                                                                <p>File type not supported</p>
                                                                                            @endif
                                                                                        @else
                                                                                            No File Available
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                                </table>
                                                                            </div>
                                                                            <!--end::content modal body-->
                                                                        </div>
                                                                    <!--end::Modal body-->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        {{ $pengumumans->appends(request()->query())->links() }}
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
                                    <div class="modal-dialog modal-dialog-centered mw-1000px">
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
                                                <form action="{{ route('insert.pengumuman') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <!--begin::Input group-->
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="required">Judul</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input class="form-control form-control-solid" type="text" name="judul" required value=""/>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="required">Tanggal Awal</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input class="form-control form-control-solid" type="date" name="tgl_awal" required value=""/>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="required">Tanggal Akhir</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input class="form-control form-control-solid" type="date" name="tgl_akhir" required value=""/>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="required">Status Pengumuman</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="status_pin" required>
                                                            <option value = 0>Tidak Disematkan</option>
                                                            <option value = 1>Disematkan</option>
                                                        </select>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="required">Paragraf 1</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <textarea class="form-control form-control-solid" name="desc1" required value="" style="height: 300px;"/></textarea>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="">Paragraf 2</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <textarea class="form-control form-control-solid" name="desc2"  value="" style="height: 300px;"/></textarea>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="">Paragraf 3</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <textarea class="form-control form-control-solid" name="desc3"  value="" style="height: 300px;"/></textarea>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="">Paragraf 4</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <textarea class="form-control form-control-solid" name="desc4"  value="" style="height: 300px;"/></textarea>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="">Paragraf 5</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <textarea class="form-control form-control-solid" name="desc5"  value="" style="height: 300px;"/></textarea>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="">Gambar</span>
                                                        </label>
                                                        <input class="form-control form-control-solid" type="file" name="gambar" />
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="">File Pengumuman</span>
                                                        </label>
                                                        <input class="form-control form-control-solid" type="file" name="nama_file" />
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
                    <script>
                        function deleteImage(itemId, imageName) {
                            if (confirm('Anda yakin ingin menghapus gambar ini?')) {
                                // Kirim permintaan AJAX ke server untuk menghapus gambar
                                $.ajax({
                                    type: 'POST',
                                    url: '/delete-imagePengumuman',
                                    data: {
                                        itemId: itemId,
                                        imageName: imageName,
                                        _token: '{{ csrf_token() }}'
                                    },
                                    success: function (response) {
                                        // Handle response, misalnya, tampilkan pesan bahwa gambar berhasil dihapus
                                        alert('Gambar berhasil dihapus');
                                        // Refresh halaman atau perbarui tampilan jika diperlukan
                                        location.reload();
                                    },
                                    error: function (xhr, status, error) {
                                        // Handle error, misalnya, tampilkan pesan kesalahan
                                        console.error(error);
                                        alert('Terjadi kesalahan saat menghapus gambar');
                                    }
                                });
                            }
                        }
                    </script>
                    <script>
                    function deleteFile(itemId) {
                        if (confirm('Anda yakin ingin menghapus file ini?')) {
                            // Kirim permintaan AJAX ke server untuk menghapus file
                            $.ajax({
                                type: 'POST',
                                url: '/delete-filePengumuman',
                                data: {
                                    itemId: itemId,
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function (response) {
                                    // Handle response, misalnya, tampilkan pesan bahwa file berhasil dihapus
                                    alert('File berhasil dihapus');
                                    // Refresh halaman atau perbarui tampilan jika diperlukan
                                    location.reload();
                                },
                                error: function (xhr, status, error) {
                                    // Handle error, misalnya, tampilkan pesan kesalahan
                                    console.error(error);
                                    alert('Terjadi kesalahan saat menghapus file');
                                }
                            });
                        }
                    }
                </script>
@endsection

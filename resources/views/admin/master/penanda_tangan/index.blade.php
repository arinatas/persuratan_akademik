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
                                                </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Table-->
                                        @if ($penandaTangans )
                                        <div class="table-responsive my-10 mx-8">
                                            <table class="table table-striped gy-7 gs-7">
                                                <thead>
                                                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                                        <th class="min-w-100px">No</th>
                                                        <th class="min-w-100px">NIDN/NIK</th>
                                                        <th class="min-w-100px">Nama</th>
                                                        <th class="min-w-100px">Jabatan</th>
                                                        <th class="min-w-100px">File TTD</th>
                                                        <th class="min-w-300px">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1; // Inisialisasi no
                                                    @endphp
                                                    @foreach ($penandaTangans as $item)
                                                    <tr>
                                                        <td>{{ $no }}</td>
                                                        <td>{{ $item->nidn }}</td>
                                                        <td>{{ $item->nama }}</td>
                                                        <td>{{ $item->jabatan }}</td>
                                                        <td>
                                                            <a href="#" class="" data-bs-toggle="modal" data-bs-target="#detailModal{{ $item->id }}">
                                                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/Visible.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24"/>
                                                                        <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                                        <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#000000" opacity="0.3"/>
                                                                    </g>
                                                                </svg><!--end::Svg Icon--></span>
                                                            </a>

                                                            <!--begin::Modal - New Card-->
                                                            <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                                                <!--begin::Modal dialog-->
                                                                <div class="modal-dialog modal-dialog-centered mw-850px">
                                                                    <!--begin::Modal content-->
                                                                    <div class="modal-content">
                                                                        <!--begin::Modal header-->
                                                                        <div class="modal-header">
                                                                            <!--begin::Modal title-->
                                                                            <h2>File Bukti</h2>
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
                                                                        <div class="modal-body scroll-y mx-xl-8">
                                                                            <!--begin::content modal body-->
                                                                            <!--begin::content modal body-->
                                                                            @if ($item->file_ttd)
                                                                                <img src="{{ asset('storage/' . basename($item->file_ttd)) }}" alt="File TTD" class="img-fluid mx-auto d-block mt-10">
                                                                            @else
                                                                                No File Available
                                                                            @endif
                                                                            <!--end::content modal body-->
                                                                        </div>
                                                                        <!--end::Modal body-->
                                                                    </div>
                                                                    <!--end::Modal content-->
                                                                </div>
                                                                <!--end::Modal dialog-->
                                                            </div>
                                                            <!--end::Modal - New Card-->
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('edit.penandaTangan', $item->id ) }}" class="btn btn-sm btn-primary btn-action" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                            <form id="form-delete" action="{{ route('destroy.penandaTangan', $item->id ) }}" method="POST"
                                                            class="d-inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button id="submit-btn" type="submit" data-toggle="tooltip" data-original-title="Hapus bagian"
                                                                class="btn btn-sm btn-danger btn-action" onclick="confirmDelete(event)"
                                                                ><i class="fas fa-trash"></i></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @php
                                                        $no++; // Tambahkan no setiap kali iterasi
                                                    @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
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
                                                <form action="{{ route('insert.penandaTangan') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <!--begin::Input group-->
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="required">NIDN/NIK</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input class="form-control form-control-solid" type="text" name="nidn" required value=""/>
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
                                                            <span class="required">Jabatan</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input class="form-control form-control-solid" type="text" name="jabatan" required value=""/>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="required">File TTD</span>
                                                        </label>
                                                        <input class="form-control form-control-solid" type="file" name="file_ttd" required/>
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

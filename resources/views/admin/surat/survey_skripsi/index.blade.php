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
                                                    <a href="#" class="btn btn-sm btn-primary fs-6" data-bs-toggle="modal" data-bs-target="#kt_modal_new_akun">Tambah</a>
                                                </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Table-->
                                        @if ($surveySkripsis )
                                        <div class="table-responsive my-10 mx-8">
                                            <table class="table table-striped gy-7 gs-7">
                                                <thead>
                                                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                                        <th class="min-w-50px">No</th>
                                                        <th class="min-w-100px">Nomor Surat</th>
                                                        <th class="min-w-100px">NIM</th>
                                                        <th class="min-w-100px">Nama</th>
                                                        <th class="min-w-100px">Status Surat</th>
                                                        <th class="min-w-100px">ACC</th>
                                                        <th class="min-w-100px">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1; // Inisialisasi no
                                                    @endphp
                                                    @foreach ($surveySkripsis as $item)
                                                    <tr>
                                                        <td>{{ $no }}</td>
                                                        <td>{{ isset($item->nomor) ? $item->nomor : '-' }}</td>
                                                        <td>{{ $item->nim1 }}</td>
                                                        <td>{{ $item->nama1 }}</td>
                                                        <td>
                                                            @if($item->status_acc == 0)
                                                                <span class="badge bg-warning text-dark">
                                                                    <i class="bi bi-clock"></i> Menunggu
                                                                </span>
                                                            @elseif($item->status_acc == 1)
                                                                <span class="badge bg-success">
                                                                    <i class="bi bi-check-circle"></i> Disetujui
                                                                </span>
                                                            @elseif($item->status_acc == 2)
                                                                <span class="badge bg-danger">
                                                                    <i class="bi bi-x-circle"></i> Ditolak
                                                                </span>
                                                            @else
                                                                <span class="badge bg-secondary">Undefined</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="btn-group d-flex flex-column">
                                                                <!-- Approve Button -->
                                                                <form method="post" action="{{ route('approve.suratSurveySkripsi', $item->id) }}">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-sm btn-success btn-action mb-2 w-100" data-toggle="tooltip" title="Setujui"><i class="fas fa-check"></i> Setujui</button>
                                                                </form>

                                                                <!-- Unapprove Button -->
                                                                <form method="post" action="{{ route('unapprove.suratSurveySkripsi', $item->id) }}">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-sm btn-warning btn-action mb-2 w-100" data-toggle="tooltip" title="Unapprove"><i class="fas fa-undo"></i> Unapprove</button>
                                                                </form>

                                                                <!-- Reject Button -->
                                                                <form method="post" action="{{ route('reject.suratSurveySkripsi', $item->id) }}">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-sm btn-danger btn-action w-100" data-toggle="tooltip" title="Tolak"><i class="fas fa-times"></i> Tolak</button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('edit.suratSurveySkripsi', $item->id ) }}" class="btn btn-sm btn-primary btn-action" data-toggle="tooltip" title="Edit">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                            <form id="form-delete" action="{{ route('destroy.suratSurveySkripsi', $item->id ) }}" method="POST" class="d-inline-block">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button id="submit-btn" type="submit" data-toggle="tooltip" title="Hapus bagian" class="btn btn-sm btn-danger btn-action" onclick="confirmDelete(event)">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                            <button class="btn btn-sm btn-info btn-action" data-bs-toggle="modal" data-bs-target="#detailModal{{ $item->id }}" title="Detail Surat">
                                                                <i class="fas fa-info-circle"></i>
                                                            </button>
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
                                                                                    <th>Nomor Surat</th>
                                                                                    <td>{{ isset($item->nomor) ? $item->nomor : '-' }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Ditujukan Kepada</th>
                                                                                    <td>{{ $item->yth }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Kepada di Tempat</th>
                                                                                    <td>{{ $item->tempat }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Topik</th>
                                                                                    <td>{{ $item->topik }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    @if($item->nim1)
                                                                                        <th>NIM 1</th>
                                                                                        <td>{{ $item->nim1 }}</td>
                                                                                    @endif
                                                                                </tr>
                                                                                <tr>
                                                                                    @if($item->nama1)
                                                                                        <th>Nama 1</th>
                                                                                        <td>{{ $item->nama1 }}</td>
                                                                                    @endif
                                                                                </tr>
                                                                                <tr>
                                                                                    @if($item->prodi1)
                                                                                        <th>Prodi 1</th>
                                                                                        <td>{{ $item->prodi1 }}</td>
                                                                                    @endif
                                                                                </tr>
                                                                                <tr>
                                                                                    @if($item->nim2)
                                                                                        <th>NIM 2</th>
                                                                                        <td>{{ $item->nim2 }}</td>
                                                                                    @endif
                                                                                </tr>
                                                                                <tr>
                                                                                    @if($item->nama2)
                                                                                        <th>Nama 2</th>
                                                                                        <td>{{ $item->nama2 }}</td>
                                                                                    @endif
                                                                                </tr>
                                                                                <tr>
                                                                                    @if($item->prodi2)
                                                                                        <th>Prodi 2</th>
                                                                                        <td>{{ $item->prodi2 }}</td>
                                                                                    @endif
                                                                                </tr>
                                                                                <tr>
                                                                                    @if($item->nim3)
                                                                                        <th>NIM 3</th>
                                                                                        <td>{{ $item->nim3 }}</td>
                                                                                    @endif
                                                                                </tr>
                                                                                <tr>
                                                                                    @if($item->nama3)
                                                                                        <th>Nama 3</th>
                                                                                        <td>{{ $item->nama3 }}</td>
                                                                                    @endif
                                                                                </tr>
                                                                                <tr>
                                                                                    @if($item->prodi3)
                                                                                        <th>Prodi 3</th>
                                                                                        <td>{{ $item->prodi3 }}</td>
                                                                                    @endif
                                                                                </tr>
                                                                                <tr>
                                                                                    @if($item->nim4)
                                                                                        <th>NIM 4</th>
                                                                                        <td>{{ $item->nim4 }}</td>
                                                                                    @endif
                                                                                </tr>
                                                                                <tr>
                                                                                    @if($item->nama4)
                                                                                        <th>Nama 4</th>
                                                                                        <td>{{ $item->nama4 }}</td>
                                                                                    @endif
                                                                                </tr>
                                                                                <tr>
                                                                                    @if($item->prodi4)
                                                                                        <th>Prodi 4</th>
                                                                                        <td>{{ $item->prodi4 }}</td>
                                                                                    @endif
                                                                                </tr>
                                                                                <tr>
                                                                                    @if($item->nim5)
                                                                                        <th>NIM 5</th>
                                                                                        <td>{{ $item->nim5 }}</td>
                                                                                    @endif
                                                                                </tr>
                                                                                <tr>
                                                                                    @if($item->nama5)
                                                                                        <th>Nama 5</th>
                                                                                        <td>{{ $item->nama5 }}</td>
                                                                                    @endif
                                                                                </tr>
                                                                                <tr>
                                                                                    @if($item->prodi5)
                                                                                        <th>Prodi 5</th>
                                                                                        <td>{{ $item->prodi5 }}</td>
                                                                                    @endif
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Status Surat</th>
                                                                                    <td>
                                                                                        @if($item->status_acc == 0)
                                                                                            <span class="badge bg-warning text-dark">
                                                                                                <i class="bi bi-clock"></i> Menunggu
                                                                                            </span>
                                                                                        @elseif($item->status_acc == 1)
                                                                                            <span class="badge bg-success">
                                                                                                <i class="bi bi-check-circle"></i> Disetujui
                                                                                            </span>
                                                                                        @elseif($item->status_acc == 2)
                                                                                            <span class="badge bg-danger">
                                                                                                <i class="bi bi-x-circle"></i> Ditolak
                                                                                            </span>
                                                                                        @else
                                                                                            <span class="badge bg-secondary">Undefined</span>
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Acc By</th>
                                                                                    <td>{{ isset($item->getUser->username) ? $item->getUser->username : 'Belum di Tindaklanjut' }}</td>
                                                                                </tr>
                                                                                </table>
                                                                            </div>
                                                                            <!--end::content modal body-->
                                                                        </div>
                                                                    <!--end::Modal body-->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div style="margin-top: 10px; margin-left: 5px; ">
                                                                <a href="{{ route('export.suratSurveySkripsi', $item->id) }}" class="btn btn-sm btn-secondary btn-action btn-block" data-toggle="tooltip" title="Unduh Surat MBKM"><i class="fas fa-download"></i> Download Surat </a>
                                                            </div>
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
                                                <form action="{{ route('insert.suratSurveySkripsi') }}" method="POST">
                                                    @csrf
                                                    <!--begin::Input group-->
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="">Nomor Surat</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input class="form-control form-control-solid" type="text" name="nomor" value=""/>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="required">Yth</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input class="form-control form-control-solid" type="text" name="yth" required value=""/>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="required">Tempat</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input class="form-control form-control-solid" type="text" name="tempat" required value=""/>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="required">Topik</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input class="form-control form-control-solid" type="text" name="topik" required value=""/>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="required">NIM 1</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input class="form-control form-control-solid" type="text" name="nim1" required value=""/>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="required">Nama 1</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input class="form-control form-control-solid" type="text" name="nama1" required value=""/>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="required">Prodi 1</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="prodi1" required>
                                                            <option value="">Pilih Prodi</option>
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
                                                            <span class="">NIM 2</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input class="form-control form-control-solid" type="text" name="nim2" value=""/>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="">Nama 2</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input class="form-control form-control-solid" type="text" name="nama2" value=""/>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="">Prodi 2</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="prodi2">
                                                            <option value="">Pilih Prodi</option>
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
                                                            <span class="">NIM 3</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input class="form-control form-control-solid" type="text" name="nim3" value=""/>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="">Nama 3</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input class="form-control form-control-solid" type="text" name="nama3" value=""/>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="">Prodi 3</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="prodi3">
                                                            <option value="">Pilih Prodi</option>
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
                                                            <span class="">NIM 4</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input class="form-control form-control-solid" type="text" name="nim4" value=""/>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="">Nama 4</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input class="form-control form-control-solid" type="text" name="nama4" value=""/>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="">Prodi 4</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="prodi4">
                                                            <option value="">Pilih Prodi</option>
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
                                                            <span class="">NIM 5</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input class="form-control form-control-solid" type="text" name="nim5" value=""/>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="">Nama 5</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input class="form-control form-control-solid" type="text" name="nama5" value=""/>
                                                    </div>
                                                    <div class="d-flex flex-column mb-7 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                            <span class="">Prodi 5</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="prodi5">
                                                            <option value="">Pilih Prodi</option>
                                                            <option value="Informatika">Informatika</option>
                                                            <option value="Sistem Informasi">Sistem Informasi</option>
                                                            <option value="Sistem Informasi Akutansi">Sistem Informasi Akutansi</option>
                                                            <option value="Akutansi">Akutansi</option>
                                                            <option value="Manajemen">Manajemen</option>
                                                            <option value="DKV">DKV</option>
                                                            <option value="Bisnis Digital">Bisnis Digital</option>
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

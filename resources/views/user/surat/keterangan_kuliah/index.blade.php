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
									<div class="card-px text-center pt-10">
										<!--begin::Title-->
										<div class="d-flex flex-row justify-content-between">
											<div>
												<h1>Informasi Surat Yang Diajukan</h1>
											</div>

										</div>
										<!--end::Title-->
									</div>
									<div class="card-body pb-10">
										<!--Begin::Table-->
										@if ($mySuratKeteranganKuliah->count() > 0)
										<div class="table-responsive">
											<table class="table table-row-bordered gy-5">
												<thead>
													<tr class="fw-bold fs-5">
														<th>No</th>
														<th class="min-w-80px">Semester</th>
														<th class="min-w-80px">Tahun Ajaran</th>
														<th class="min-w-80px">Nama Orang Tua</th>
														<th class="min-w-80px">Pangkat</th>
														<th>Status</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													@php
														$no = 1; // Inisialisasi no
													@endphp
													@foreach($mySuratKeteranganKuliah as $item)
														<tr>
															<td>{{ $no }}</td>
															<td>{{ $item->semester }}</td>
															<td>{{ $item->tahun_akademik }}</td>
															<td>{{ $item->nama_ortu }}</td>
															<td>{{ $item->pangkat }}</td>
															<td>
																@if ($item->status_acc == 0)
																<span class="badge bg-warning text-dark">Menunggu</span>
																@elseif($item->status_acc == 1)
																<span class="badge bg-success">Disetujui</span>
																@elseif($item->status_acc == 2)
																<span class="badge bg-danger">Ditolak</span>
																@endif
															</td>
															<td>
																@if ($item->status_acc == 0)
																	<a href="{{ route('userSuratKetKuliahEdit', $item->id ) }}" class="btn btn-sm btn-primary btn-action" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
																@endif
																@if ($item->status_acc == 1)
																	<a href="{{ route('userSuratKetKuliahPrint', $item->id) }}" class="btn btn-sm btn-success btn-action" target="blank" data-toggle="tooltip" title="Unduh Surat"><i class="fas fa-download"></i></a>
																@endif
																<button class="btn btn-sm btn-info btn-action" data-bs-toggle="modal" data-bs-target="#detailModal{{ $item->id }}" title="Detail Surat">
																	<i class="fas fa-info-circle"></i>
																</button>
																<form id="form-delete" action="{{ route('userSuratKetKuliahDestroy', $item->id ) }}" method="POST"
																class="d-inline-block">
																@csrf
																@method('DELETE')
																<button id="submit-btn" type="submit" data-toggle="tooltip" data-original-title="Hapus bagian"
																	class="btn btn-sm btn-danger btn-action" onclick="confirmDelete(event)"
																	><i class="fas fa-trash"></i></i></button>
																</form>
																{{-- this modal --}}
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
																							<th>NIM</th>
																							<td>{{ $item->nim }}</td>
																						</tr>
																						<tr>
																							<th>Nama</th>
																							<td>{{ $item->biodata->nama }}</td>
																						</tr>
																						<tr>
																							<th>Tempat Lahir</th>
																							<td>{{ $item->biodata->tempat_lahir }}</td>
																						</tr>
																						<tr>
																							<th>Tanggal Lahir</th>
																							<td>{{ $item->biodata->tgl_lahir }}</td>
																						</tr>
																						<tr>
																							<th>Program Studi</th>
																							<td>{{ $item->biodata->prodi }}</td>
																						</tr>
																						<tr>
																							<th>Alamat</th>
																							<td>{{ $item->biodata->alamat }}</td>
																						</tr>
																						<tr>
																							<th>Nama Orang Tua</th>
																							<td>{{ $item->nama_ortu }}</td>
																						</tr>
																						<tr>
																							<th>Pangkat / Golongan</th>
																							<td>{{ $item->pangkat }}</td>
																						</tr>
																						<tr>
																							<th>Semester</th>
																							<td>{{ $item->semester }}</td>
																						</tr>
																						<tr>
																							<th>Tahun Akademik</th>
																							<td>{{ $item->tahun_akademik }}</td>
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
																{{-- this modal --}}
															</td>
														</tr>
														@php
															$no++; // Tambahkan no setiap kali iterasi
														@endphp
													@endforeach
												</tbody>
											</table>
										</div>
                                        {{ $mySuratKeteranganKuliah->links() }}

										@else
										<div class="">
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
								<!--begin::Card-->
								<div class="card  mt-10">
									<!--begin::Card body-->
									<div class="card-body">
										<!--begin::Heading-->
										<div class="heading text-center mt-5 mb-15">
											<h1>Form {{ $title }}</h1>
										</div>
										<!--begin::Row-->
										<form action="{{ url('userSuratKetKuliahStore') }}" method="POST">
											<div class="row g-5 g-xl-8">
												@csrf
												<div class="col-lg-6">
													<label class="required form-label">Nama Orang Tua</label>
													<input type="text" value="{{ old('nama_ortu') }}" class="form-control form-control-solid  @error('nama_ortu') is-invalid @enderror" required name="nama_ortu" />
													@error('nama_ortu')
														<div class="invalid-feedback mb-1">
															{{ $message }}
														</div>
													@enderror
												</div>
												<div class="col-lg-6">
													<label class="form-label">Pangkat / Golongan</label>
													<input type="text" value="{{ old('pangkat') }}" class="form-control form-control-solid  @error('pangkat') is-invalid @enderror" name="pangkat"/>
													@error('pangkat')
														<div class="invalid-feedback mb-1">
															{{ $message }}
														</div>
													@enderror
												</div>
												<div class="col-lg-6">
													<label class="required form-label">Semester</label>
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="semester" required>
														<option value="Ganjil">Ganjil</option>
														<option value="Genap">Genap</option>
													</select>
												</div>
												@php
													$tahun = \Carbon\Carbon::now()->format('Y');
													$tahunBefore = $tahun-1;
													$tahunAfter = $tahun+1;
												@endphp
												<div class="col-lg-6">
													<label class="required form-label">Tahun Ajaran</label>
													{{-- <input type="text" value="{{ $tahun .'/'. $tahunAfter }}" class="form-control form-control-solid  @error('tahun_akademik') is-invalid @enderror" required name="tahun_akademik"/> --}}
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="tahun_akademik" required>
														<option value="{{ $tahunBefore .'/'. $tahun }}">{{ $tahunBefore .'/'. $tahun }}</option>
														<option value="{{ $tahun .'/'. $tahunAfter }}">{{ $tahun .'/'. $tahunAfter }}</option>
													</select>
												</div>


                                                {{-- hidden input --}}
													<input type="hidden" value="0" class="form-control form-control-solid" name="status_acc"/>
													<input type="hidden" value="{{ $biomhs[0]->nim }}" class="form-control form-control-solid" readonly name="nim"/>
													<input type="hidden" value="" class="form-control form-control-solid" name="nomor"/>
													<input type="hidden" value="" class="form-control form-control-solid" name="acc_by"/>
                                                {{-- end hidden input --}}

												<div class="d-flex justify-content-end mt-10 pb-10">
													<!--begin::Actions-->
													<button id="submit_form" type="submit" class="btn btn-primary" style="margin-left: 10px; margin-right: 10px;">
														<span class="indicator-label">
															Submit
														</span>
													</button>
													<!--end::Actions-->
												</div>
											</div>
										</form>
										<!--end::Row-->
									</div>
									<!--end::Card body-->
								</div>
								<!--end::Card-->
								
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
					</script>
@endsection

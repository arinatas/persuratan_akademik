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
									<div class="card-body">
										<!--begin::Heading-->
										<div class="heading text-center mt-5 mb-15">
											<h1>Edit {{ $title }}</h1>
										</div>
										<!--begin::Row-->
										<form action="{{ url('userSuratKetKuliahUpdate', $mySuratKeteranganKuliah->id) }}" method="POST">
											<div class="row g-5 g-xl-8">
												@csrf
												<div class="col-lg-6">
													<label class="required form-label">Nama Orang Tua</label>
													<input type="text" value="{{ $mySuratKeteranganKuliah->nama_ortu }}" class="form-control form-control-solid  @error('nama_ortu') is-invalid @enderror" required name="nama_ortu" />
													@error('nama_ortu')
														<div class="invalid-feedback mb-1">
															{{ $message }}
														</div>
													@enderror
												</div>
												<div class="col-lg-6">
													<label class="form-label">Pangkat / Golongan</label>
													<input type="text" value="{{ $mySuratKeteranganKuliah->pangkat }}" class="form-control form-control-solid  @error('pangkat') is-invalid @enderror" name="pangkat"/>
													@error('pangkat')
														<div class="invalid-feedback mb-1">
															{{ $message }}
														</div>
													@enderror
												</div>
												<div class="col-lg-6">
													<label class="required form-label">Semester</label>
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="semester" required>
														<option value="Ganjil" {{ $mySuratKeteranganKuliah->semester == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
														<option value="Genap" {{ $mySuratKeteranganKuliah->semester == 'Genap' ? 'selected' : '' }}>Genap</option>
													</select>
												</div>
												@php
													$tahun = \Carbon\Carbon::now()->format('Y');
													$tahunBefore = $tahun-1;
													$tahunAfter = $tahun+1;
												@endphp
												<div class="col-lg-6">
													<label class="required form-label">Tahun Ajaran</label>
													{{-- <input type="text" value="{{ $mySuratKeteranganKuliah->tahun_akademik }}" class="form-control form-control-solid  @error('tahun_akademik') is-invalid @enderror" required name="tahun_akademik"/> --}}
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="tahun_akademik" required>
														<option value="{{ $tahunBefore .'/'. $tahun }}" {{ $mySuratKeteranganKuliah->tahun_akademik == $tahunBefore .'/'. $tahun  ? 'selected' : '' }} >{{ $tahunBefore .'/'. $tahun }}</option>
														<option value="{{ $tahun .'/'. $tahunAfter }}" {{ $mySuratKeteranganKuliah->tahun_akademik == $tahun .'/'. $tahunAfter  ? 'selected' : '' }} >{{ $tahun .'/'. $tahunAfter }}</option>
													</select>

												</div>

                                                {{-- hidden input --}}
													<input type="hidden" value="{{ $mySuratKeteranganKuliah->status_acc }}" class="form-control form-control-solid" name="status_acc"/>
													<input type="hidden" value="{{ $mySuratKeteranganKuliah->nomor }}" class="form-control form-control-solid" name="nomor"/>
													<input type="hidden" value="{{ $mySuratKeteranganKuliah->acc_by }}" class="form-control form-control-solid" name="acc_by"/>
													<input type="hidden" value="{{ $mySuratKeteranganKuliah->nim }}" class="form-control form-control-solid" readonly name="nim"/>
                                                {{-- end hidden input --}}

												<div class="d-flex justify-content-end mt-10 pb-10">
													<!--begin::Actions-->
													<a href="{{ url()->previous() }}" class="btn btn-secondary">
														<span class="indicator-label">
															Cancel
														</span>
													</a>
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

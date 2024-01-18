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
										<form action="{{ url('userSuratSurveySkripsiUpdate', $mySurveySkripsi->id) }}" method="POST">
											<div class="row g-5 g-xl-8">
												@csrf
												<div class="col-lg-6">
													<label class="required form-label">Ditujukan Kepada (Yth. )</label>
													<input type="text" value="{{ $mySurveySkripsi->yth }}" class="form-control form-control-solid  @error('yth') is-invalid @enderror" required name="yth" />
													@error('yth')
														<div class="invalid-feedback mb-1">
															{{ $message }}
														</div>
													@enderror
												</div>
												<div class="col-lg-12">
													<label class="required form-label">Topik</label>
													<input type="text" value="{{ $mySurveySkripsi->topik }}" class="form-control form-control-solid  @error('topik') is-invalid @enderror" required name="topik"/>
													@error('topik')
														<div class="invalid-feedback mb-1">
															{{ $message }}
														</div>
													@enderror
												</div>

												<hr>
												<div class="heading text-start my-0">
													<p>1</p>
												</div>
												<div class="col-lg-4">
													<label class="required form-label">NIM</label>
													<input type="text" value="{{ $biomhs[0]->nim }}" class="form-control form-control-solid" readonly name="nim1"/>
												</div>
												<div class="col-lg-4">
													<label class="required form-label">Nama</label>
													<input type="text" value="{{ $biomhs[0]->nama }}" class="form-control form-control-solid" readonly name="nama1"/>
												</div>
												<div class="col-lg-4">
													<label class="required form-label">Prodi</label>
													<input type="text" value="{{ $biomhs[0]->prodi }}" class="form-control form-control-solid" readonly name="prodi1"/>
												</div>
												<hr>
												<div class="heading text-start my-0">
													<p>2</p>
												</div>
												<div class="col-lg-4">
													<label class="form-label">NIM</label>
													<input type="text" value="{{ $mySurveySkripsi->nim2 }}" class="form-control form-control-solid" name="nim2"/>
												</div>
												<div class="col-lg-4">
													<label class="form-label">Nama</label>
													<input type="text" value="{{ $mySurveySkripsi->nama2 }}" class="form-control form-control-solid" name="nama2"/>
												</div>
												<div class="col-lg-4">
													<label class="form-label">Prodi</label>
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="prodi2">
                                                        <option value="" {{ is_null($mySurveySkripsi->prodi2) ? 'selected' : '' }}>Pilih Prodi</option>
														<option value="Informatika" {{ $mySurveySkripsi->prodi2 == 'Informatika' ? 'selected' : '' }}>Informatika</option>
														<option value="Sistem Informasi" {{ $mySurveySkripsi->prodi2 == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
														<option value="Sistem Informasi Akutansi" {{ $mySurveySkripsi->prodi2 == 'Sistem Informasi Akutansi' ? 'selected' : '' }}>Sistem Informasi Akutansi</option>
														<option value="Akutansi" {{ $mySurveySkripsi->prodi2 == 'Akutansi' ? 'selected' : '' }}>Akutansi</option>
														<option value="Manajemen" {{ $mySurveySkripsi->prodi2 == 'Manajemen' ? 'selected' : '' }}>Manajemen</option>
														<option value="DKV" {{ $mySurveySkripsi->prodi2 == 'DKV' ? 'selected' : '' }}>DKV</option>
														<option value="Bisnis Digital" {{ $mySurveySkripsi->prodi2 == 'Bisnis Digital' ? 'selected' : '' }}>Bisnis Digital</option>
                                                    </select>
												</div>
												<hr>
												<div class="heading text-start my-0">
													<p>3</p>
												</div>
												<div class="col-lg-4">
													<label class="form-label">NIM</label>
													<input type="text" value="{{ $mySurveySkripsi->nim3 }}" class="form-control form-control-solid" name="nim3"/>
												</div>
												<div class="col-lg-4">
													<label class="form-label">Nama</label>
													<input type="text" value="{{ $mySurveySkripsi->nama3 }}" class="form-control form-control-solid" name="nama3"/>
												</div>
												<div class="col-lg-4">
													<label class="form-label">Prodi</label>
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="prodi3">
                                                        <option value="" {{ is_null($mySurveySkripsi->prodi3) ? 'selected' : '' }}>Pilih Prodi</option>
														<option value="Informatika" {{ $mySurveySkripsi->prodi3 == 'Informatika' ? 'selected' : '' }}>Informatika</option>
														<option value="Sistem Informasi" {{ $mySurveySkripsi->prodi3 == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
														<option value="Sistem Informasi Akutansi" {{ $mySurveySkripsi->prodi3 == 'Sistem Informasi Akutansi' ? 'selected' : '' }}>Sistem Informasi Akutansi</option>
														<option value="Akutansi" {{ $mySurveySkripsi->prodi3 == 'Akutansi' ? 'selected' : '' }}>Akutansi</option>
														<option value="Manajemen" {{ $mySurveySkripsi->prodi3 == 'Manajemen' ? 'selected' : '' }}>Manajemen</option>
														<option value="DKV" {{ $mySurveySkripsi->prodi3 == 'DKV' ? 'selected' : '' }}>DKV</option>
														<option value="Bisnis Digital" {{ $mySurveySkripsi->prodi3 == 'Bisnis Digital' ? 'selected' : '' }}>Bisnis Digital</option>
                                                    </select>
												</div>
												<hr>
												<div class="heading text-start my-0">
													<p>4</p>
												</div>
												<div class="col-lg-4">
													<label class="form-label">NIM</label>
													<input type="text" value="{{ $mySurveySkripsi->nim4 }}" class="form-control form-control-solid" name="nim4"/>
												</div>
												<div class="col-lg-4">
													<label class="form-label">Nama</label>
													<input type="text" value="{{ $mySurveySkripsi->nama4 }}" class="form-control form-control-solid" name="nama4"/>
												</div>
												<div class="col-lg-4">
													<label class="form-label">Prodi</label>
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="prodi4">
                                                        <option value="" {{ is_null($mySurveySkripsi->prodi4) ? 'selected' : '' }}>Pilih Prodi</option>
														<option value="Informatika" {{ $mySurveySkripsi->prodi4 == 'Informatika' ? 'selected' : '' }}>Informatika</option>
														<option value="Sistem Informasi" {{ $mySurveySkripsi->prodi4 == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
														<option value="Sistem Informasi Akutansi" {{ $mySurveySkripsi->prodi4 == 'Sistem Informasi Akutansi' ? 'selected' : '' }}>Sistem Informasi Akutansi</option>
														<option value="Akutansi" {{ $mySurveySkripsi->prodi4 == 'Akutansi' ? 'selected' : '' }}>Akutansi</option>
														<option value="Manajemen" {{ $mySurveySkripsi->prodi4 == 'Manajemen' ? 'selected' : '' }}>Manajemen</option>
														<option value="DKV" {{ $mySurveySkripsi->prodi4 == 'DKV' ? 'selected' : '' }}>DKV</option>
														<option value="Bisnis Digital" {{ $mySurveySkripsi->prodi4 == 'Bisnis Digital' ? 'selected' : '' }}>Bisnis Digital</option>
                                                    </select>
												</div>
												<hr>
												<div class="heading text-start my-0">
													<p>5</p>
												</div>
												<div class="col-lg-4">
													<label class="form-label">NIM</label>
													<input type="text" value="{{ $mySurveySkripsi->nim5 }}" class="form-control form-control-solid" name="nim5"/>
												</div>
												<div class="col-lg-4">
													<label class="form-label">Nama</label>
													<input type="text" value="{{ $mySurveySkripsi->nama5 }}" class="form-control form-control-solid" name="nama5"/>
												</div>
												<div class="col-lg-4">
													<label class="form-label">Prodi</label>
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="prodi5">
                                                        <option value="" {{ is_null($mySurveySkripsi->prodi5) ? 'selected' : '' }}>Pilih Prodi</option>
														<option value="Informatika" {{ $mySurveySkripsi->prodi5 == 'Informatika' ? 'selected' : '' }}>Informatika</option>
														<option value="Sistem Informasi" {{ $mySurveySkripsi->prodi5 == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
														<option value="Sistem Informasi Akutansi" {{ $mySurveySkripsi->prodi5 == 'Sistem Informasi Akutansi' ? 'selected' : '' }}>Sistem Informasi Akutansi</option>
														<option value="Akutansi" {{ $mySurveySkripsi->prodi5 == 'Akutansi' ? 'selected' : '' }}>Akutansi</option>
														<option value="Manajemen" {{ $mySurveySkripsi->prodi5 == 'Manajemen' ? 'selected' : '' }}>Manajemen</option>
														<option value="DKV" {{ $mySurveySkripsi->prodi5 == 'DKV' ? 'selected' : '' }}>DKV</option>
														<option value="Bisnis Digital" {{ $mySurveySkripsi->prodi5 == 'Bisnis Digital' ? 'selected' : '' }}>Bisnis Digital</option>
                                                    </select>
												</div>
												<hr>

                                                {{-- hidden input --}}
													<input type="hidden" value="{{ $mySurveySkripsi->status_acc }}" class="form-control form-control-solid" name="status_acc"/>
													<input type="hidden" value="{{ $mySurveySkripsi->nomor }}" class="form-control form-control-solid" name="nomor"/>
													<input type="hidden" value="{{ $mySurveySkripsi->acc_by }}" class="form-control form-control-solid" name="acc_by"/>
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

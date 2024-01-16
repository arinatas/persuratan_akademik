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
											<h1>Form {{ $title }}</h1>
										</div>
										<!--begin::Row-->
										<form action="" method="POST">
										{{-- <form action="{{ url('userSuratSurveyMatkulStore') }}" method="POST"> --}}
											<div class="row g-5 g-xl-8">
												@csrf
												<div class="col-lg-4">
													<label class="required form-label">Ditujukan Kepada (Yth. )</label>
													<input type="text" value="" class="form-control form-control-solid" required name="yth" />
												</div>
												<div class="col-lg-4">
													<label class="required form-label">Tempat / Perusahaan MBKM</label>
													<input type="text" value="" class="form-control form-control-solid" required name="tempat"/>
												</div>
                                                <div class="col-lg-2">
													<label class="form-label">Tanggal Mulai</label>
													<input type="date" value="" class="form-control form-control-solid" required name="tgl_mulai"/>
												</div>
                                                <div class="col-lg-2">
													<label class="form-label">Tanggal Selesai</label>
													<input type="date" value="" class="form-control form-control-solid" required name="tgl_selesai"/>
												</div>
												<hr>
												<div class="heading text-start my-0">
													<p>1</p>
												</div>
												<div class="col-lg-4">
													<label class="required form-label">NIM</label>
													<input type="text" value="{{ $biomhs[0]->nim }}" class="form-control form-control-solid" readonly name="nama1"/>
												</div>
												<div class="col-lg-4">
													<label class="required form-label">Nama</label>
													<input type="text" value="{{ $biomhs[0]->nama }}" class="form-control form-control-solid" readonly name="nim1"/>
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
													<input type="text" value="" class="form-control form-control-solid" name="nama2"/>
												</div>
												<div class="col-lg-4">
													<label class="form-label">Nama</label>
													<input type="text" value="" class="form-control form-control-solid" name="nim2"/>
												</div>
												<div class="col-lg-4">
													<label class="form-label">Prodi</label>
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="prodi2" required>
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
												<hr>
												<div class="heading text-start my-0">
													<p>3</p>
												</div>
												<div class="col-lg-4">
													<label class="form-label">NIM</label>
													<input type="text" value="" class="form-control form-control-solid" name="nama3"/>
												</div>
												<div class="col-lg-4">
													<label class="form-label">Nama</label>
													<input type="text" value="" class="form-control form-control-solid" name="nim3"/>
												</div>
												<div class="col-lg-4">
													<label class="form-label">Prodi</label>
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="prodi3" required>
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
												<hr>
												<div class="heading text-start my-0">
													<p>4</p>
												</div>
												<div class="col-lg-4">
													<label class="form-label">NIM</label>
													<input type="text" value="" class="form-control form-control-solid" name="nama4"/>
												</div>
												<div class="col-lg-4">
													<label class="form-label">Nama</label>
													<input type="text" value="" class="form-control form-control-solid" name="nim4"/>
												</div>
												<div class="col-lg-4">
													<label class="form-label">Prodi</label>
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="prodi4" required>
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
												<hr>
												<div class="heading text-start my-0">
													<p>5</p>
												</div>
												<div class="col-lg-4">
													<label class="form-label">NIM</label>
													<input type="text" value="" class="form-control form-control-solid" name="nama5"/>
												</div>
												<div class="col-lg-4">
													<label class="form-label">Nama</label>
													<input type="text" value="" class="form-control form-control-solid" name="nim5"/>
												</div>
												<div class="col-lg-4">
													<label class="form-label">Prodi</label>
													<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="prodi5" required>
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
												<hr>

                                                {{-- hidden input --}}
													<input type="hidden" value="0" class="form-control form-control-solid" name="status_acc"/>
													<input type="hidden" value="" class="form-control form-control-solid" name="nomor"/>
													<input type="hidden" value="" class="form-control form-control-solid" name="acc_by"/>
                                                {{-- end hidden input --}}

												<div class="d-flex justify-content-end mt-10 pb-10">
													<!--begin::Actions-->
													<a href="{{ route('userDashboard') }}" class="btn btn-secondary">
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
@endsection

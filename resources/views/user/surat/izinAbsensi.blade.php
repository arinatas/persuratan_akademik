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
								<div class="card mb-15">
									<!--begin::Card body-->
									<div class="card-body pb-10">
										<!--begin::Heading-->
										<div class="heading text-center mt-5 mb-10">
											<h1>Form {{ $title }}</h1>
										</div>
										<!--begin::Row-->
										<form action="{{ url('suratIzinAbsensi') }}" method="POST" target="_blank">
											<div class="row g-5 g-xl-8">
												@csrf
												<div class="col-lg-4">
													<label class="required form-label">Nama</label>
													<input type="text" value="{{ $biomhs[0]->nama }}" class="form-control form-control-solid" readonly name="nama"/>
												</div>
												<div class="col-lg-4">
													<label class="required form-label">Nim</label>
													<input type="text" value="{{ $biomhs[0]->nim }}" class="form-control form-control-solid" readonly name="nim"/>
												</div>
												<div class="col-lg-4">
													<label class="required form-label">Prodi</label>
													<input type="text" value="{{ $biomhs[0]->prodi }}" class="form-control form-control-solid" readonly name="prodi"/>
												</div>
												<div class="col-lg-6">
													<label class="required form-label">Alasan Permohonan Izin</label>
													<input type="text" value="" class="form-control form-control-solid" required name="alasan" />
												</div>
												<div class="col-lg-6">
													<label class="required form-label">Nama Orang Tua / Wali</label>
													<input type="text" value="" class="form-control form-control-solid" required name="ortu"/>
												</div>
												<hr>
												<div class="heading text-start my-0">
													<p>1</p>
												</div>
												<div class="col-lg-3">
													<label class="form-label">Matakuliah</label>
													<input type="text" value="" class="form-control form-control-solid" name="matakuliah1"/>
												</div>
												<div class="col-lg-3">
													<label class="form-label">Dosen</label>
													<input type="text" value="" class="form-control form-control-solid" name="dosen1"/>
												</div>
												<div class="col-lg-2">
													<label class="form-label">Tanggal</label>
													<input type="date" value="" class="form-control form-control-solid" name="tanggal1"/>
												</div>
												<div class="col-lg-2">
													<label class="form-label">Jam</label>
													<input type="time" value="" class="form-control form-control-solid" name="jam1"/>
												</div>
												<div class="col-lg-2">
													<label class="form-label">Jumlah Izin</label>
													<input type="number" value="" class="form-control form-control-solid" name="jml_izin1"/>
												</div>
												<hr>
												<div class="heading text-start my-0">
													<p>2</p>
												</div>
												<div class="col-lg-3">
													<label class="form-label">Matakuliah</label>
													<input type="text" value="" class="form-control form-control-solid" name="matakuliah2"/>
												</div>
												<div class="col-lg-3">
													<label class="form-label">Dosen</label>
													<input type="text" value="" class="form-control form-control-solid" name="dosen2"/>
												</div>
												<div class="col-lg-2">
													<label class="form-label">Tanggal</label>
													<input type="date" value="" class="form-control form-control-solid" name="tanggal2"/>
												</div>
												<div class="col-lg-2">
													<label class="form-label">Jam</label>
													<input type="time" value="" class="form-control form-control-solid" name="jam2"/>
												</div>
												<div class="col-lg-2">
													<label class="form-label">Jumlah Izin</label>
													<input type="number" value="" class="form-control form-control-solid" name="jml_izin2"/>
												</div>
												<hr>
												<div class="heading text-start my-0">
													<p>3</p>
												</div>
												<div class="col-lg-3">
													<label class="form-label">Matakuliah</label>
													<input type="text" value="" class="form-control form-control-solid" name="matakuliah3"/>
												</div>
												<div class="col-lg-3">
													<label class="form-label">Dosen</label>
													<input type="text" value="" class="form-control form-control-solid" name="dosen3"/>
												</div>
												<div class="col-lg-2">
													<label class="form-label">Tanggal</label>
													<input type="date" value="" class="form-control form-control-solid" name="tanggal3"/>
												</div>
												<div class="col-lg-2">
													<label class="form-label">Jam</label>
													<input type="time" value="" class="form-control form-control-solid" name="jam3"/>
												</div>
												<div class="col-lg-2">
													<label class="form-label">Jumlah Izin</label>
													<input type="number" value="" class="form-control form-control-solid" name="jml_izin3"/>
												</div>
												<hr>
												<div class="heading text-start my-0">
													<p>4</p>
												</div>
												<div class="col-lg-3">
													<label class="form-label">Matakuliah</label>
													<input type="text" value="" class="form-control form-control-solid" name="matakuliah4"/>
												</div>
												<div class="col-lg-3">
													<label class="form-label">Dosen</label>
													<input type="text" value="" class="form-control form-control-solid" name="dosen4"/>
												</div>
												<div class="col-lg-2">
													<label class="form-label">Tanggal</label>
													<input type="date" value="" class="form-control form-control-solid" name="tanggal4"/>
												</div>
												<div class="col-lg-2">
													<label class="form-label">Jam</label>
													<input type="time" value="" class="form-control form-control-solid" name="jam4"/>
												</div>
												<div class="col-lg-2">
													<label class="form-label">Jumlah Izin</label>
													<input type="number" value="" class="form-control form-control-solid" name="jml_izin4"/>
												</div>
												<hr>
												<div class="heading text-start my-0">
													<p>5</p>
												</div>
												<div class="col-lg-3">
													<label class="form-label">Matakuliah</label>
													<input type="text" value="" class="form-control form-control-solid" name="matakuliah5"/>
												</div>
												<div class="col-lg-3">
													<label class="form-label">Dosen</label>
													<input type="text" value="" class="form-control form-control-solid" name="dosen5"/>
												</div>
												<div class="col-lg-2">
													<label class="form-label">Tanggal</label>
													<input type="date" value="" class="form-control form-control-solid" name="tanggal5"/>
												</div>
												<div class="col-lg-2">
													<label class="form-label">Jam</label>
													<input type="time" value="" class="form-control form-control-solid" name="jam5"/>
												</div>
												<div class="col-lg-2">
													<label class="form-label">Jumlah Izin</label>
													<input type="number" value="" class="form-control form-control-solid" name="jml_izin5"/>
												</div>
												<hr>

												<div class="d-flex justify-content-end pb-20">
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

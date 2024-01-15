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
										<form action="{{ url('suratMengundurkanDiri') }}" method="POST" target="_blank">
											<div class="row g-5 g-xl-8">
												@csrf
												<div class="col-lg-6">
													<label class="required form-label">Dosen PA</label>
													<input type="text" value="{{ $biomhs[0]->dosenPA->nama }}" class="form-control form-control-solid" readonly name="dosenPA"/>
													<input type="hidden" value="{{ $biomhs[0]->dosenPA->nidn }}" class="form-control form-control-solid" readonly name="dosenPA_nidn"/>

												</div>
												<div class="col-lg-6">
													<label class="required form-label">Kaprodi</label>
													@foreach ($kaprodi as $item)
														@if ($item->prodi == $biomhs[0]->prodi)
															<input type="text" value="{{ $item->nama }}" class="form-control form-control-solid" readonly name="kaprodi"/>
															<input type="hidden" value="{{ $item->nidn }}" class="form-control form-control-solid" readonly name="kaprodi_nidn"/>
														@endif
													@endforeach
												</div>
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
												<div class="col-lg-12">
													<label class="required form-label">Alasan Mengundurkan Diri</label>
													<input type="text" value="" class="form-control form-control-solid" required name="alasan" />
												</div>
												<div class="col-lg-12">
													<label class="required form-label">Nama Orang Tua / Wali</label>
													<input type="text" value="" class="form-control form-control-solid" required name="ortu"/>
												</div>

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

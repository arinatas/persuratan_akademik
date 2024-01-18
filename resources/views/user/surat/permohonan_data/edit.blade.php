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
										<form action="{{ url('userSuratPermohonanDataUpdate', $mySuratPermohonanData->id) }}" method="POST">
											<div class="row g-5 g-xl-8">
												@csrf
												<div class="col-lg-12">
													<label class="required form-label">Ditujukan Kepada (Yth. )</label>
													<input type="text" value="{{ $mySuratPermohonanData->yth }}" class="form-control form-control-solid  @error('yth') is-invalid @enderror" required name="yth" />
													@error('yth')
														<div class="invalid-feedback mb-1">
															{{ $message }}
														</div>
													@enderror
												</div>
												<div class="col-lg-12">
													<label class="required form-label">Data 1</label>
													<input type="text" value="{{ $mySuratPermohonanData->data1 }}" class="form-control form-control-solid  @error('data1') is-invalid @enderror" required name="data1"/>
													@error('data1')
														<div class="invalid-feedback mb-1">
															{{ $message }}
														</div>
													@enderror
												</div>
												<div class="col-lg-12">
													<label class="form-label">Data 2</label>
													<input type="text" value="{{ $mySuratPermohonanData->data2 }}" class="form-control form-control-solid  @error('data2') is-invalid @enderror" name="data2"/>
													@error('data2')
														<div class="invalid-feedback mb-1">
															{{ $message }}
														</div>
													@enderror
												</div>
												<div class="col-lg-12">
													<label class="form-label">Data 3</label>
													<input type="text" value="{{ $mySuratPermohonanData->data3 }}" class="form-control form-control-solid  @error('data3') is-invalid @enderror" name="data3"/>
													@error('data3')
														<div class="invalid-feedback mb-1">
															{{ $message }}
														</div>
													@enderror
												</div>
												<div class="col-lg-12">
													<label class="form-label">Data 4</label>
													<input type="text" value="{{ $mySuratPermohonanData->data4 }}" class="form-control form-control-solid  @error('data4') is-invalid @enderror" name="data4"/>
													@error('data4')
														<div class="invalid-feedback mb-1">
															{{ $message }}
														</div>
													@enderror
												</div>
												<div class="col-lg-12">
													<label class="form-label">Data 5</label>
													<input type="text" value="{{ $mySuratPermohonanData->data5 }}" class="form-control form-control-solid  @error('data5') is-invalid @enderror" name="data5"/>
													@error('data5')
														<div class="invalid-feedback mb-1">
															{{ $message }}
														</div>
													@enderror
												</div>

                                                {{-- hidden input --}}
													<input type="hidden" value="0" class="form-control form-control-solid" name="status_acc"/>
													<input type="hidden" value="{{ $mySuratPermohonanData->nomor }}" class="form-control form-control-solid" name="nomor"/>
													<input type="hidden" value="{{ $mySuratPermohonanData->acc_by }}" class="form-control form-control-solid" name="acc_by"/>
													<input type="hidden" value="{{ $mySuratPermohonanData->nim }}" class="form-control form-control-solid" readonly name="nim"/>
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

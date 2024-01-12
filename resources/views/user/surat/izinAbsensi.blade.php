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
									<div class="card-body pb-0">
										<!--begin::Heading-->
										<div class="heading text-center mb-5">
											<h2>{{ $title }}</h2>
										</div>
										<!--begin::Row-->
										<div class="row g-5 g-xl-8">
											<form action="#" method="POST">
												@csrf
												<div class="mb-10">
													<label for="exampleFormControlInput1" class="required form-label">NIDN/NIK</label>
													<input type="text" value="" class="form-control form-control-solid" required name="nidn"/>
												</div>
												<div class="mb-10">
													<label for="exampleFormControlInput1" class="required form-label">Nama</label>
													<input type="text" value="" class="form-control form-control-solid" required name="nama"/>
												</div>
												<div class="mb-10">
													<label for="exampleFormControlInput1" class="required form-label">Jabatan</label>
													<input type="text" value="" class="form-control form-control-solid" required name="jabatan"/>
												</div>
												<div class="d-flex justify-content-end">
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
											</form>
										</div>
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

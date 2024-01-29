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
								<!--begin::Post card-->
								<div class="card">
									<!--begin::Body-->
									<div class="card-body p-lg-20 pb-lg-0">
										<!--begin::Layout-->
										<div class="d-flex flex-column flex-xl-row">
											<!--begin::Content-->
											<div class="flex-lg-row-fluid me-xl-15">
												<!--begin::Post content-->
												<div class="mb-17">
													<!--begin::Wrapper-->
													<div class="mb-8">
														<!--begin::Info-->
														<div class="d-flex flex-wrap mb-6">
															<!--begin::Item-->
															<div class="me-9 my-1">
																<!--begin::Icon-->
																<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
																<span class="svg-icon svg-icon-primary svg-icon-2 me-1">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
																		<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
																<!--end::Icon-->
																<!--begin::Label-->
																<span class="fw-bolder text-gray-400">{{ \Carbon\Carbon::parse($panduan->tgl_terbit)->isoFormat('D MMMM Y') }}</span>
																<!--end::Label-->
															</div>
															<!--end::Item-->
															<!--begin::Item-->
															<div class="me-9 my-1">
																<!--begin::Icon-->
																<!--SVG file not found: icons/duotune/finance/fin006.svgFolder.svg-->
																<!--end::Icon-->
																<!--begin::Label-->
																<span class="fw-bolder text-gray-400">Pusat Informasi Akademik</span>
																<!--begin::Label-->
															</div>
															<!--end::Item-->
														</div>
														<!--end::Info-->
														<!--begin::Title-->
														<span class="text-dark text-hover-primary fs-2 fw-bolder">{{ $panduan->judul }}</span>
														<!--end::Title-->
														<!--begin::Container-->
														<div class="overlay mt-8">
															<!--begin::Image-->
															@php
																$extension = pathinfo($panduan->gambar, PATHINFO_EXTENSION);
															@endphp
															@if ($panduan->gambar)
																@if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']))
																	{{-- Display image --}}
															
																	<div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-350px" style="background-image:url('{{ asset('storage/' . $panduan->gambar) }}')"></div>

																@else
																	{{-- Handle other file types --}}
																	<p>File type not supported</p>
																@endif
															@else
																No File Available
															@endif
															<!--end::Image-->
														</div>
														<!--end::Container-->
														@if ($panduan->nama_file)
														<div class="file text-center mt-10">
															@php
																$extension = pathinfo($panduan->nama_file, PATHINFO_EXTENSION);
															@endphp
															@if ($panduan->nama_file)
																@if (in_array(strtolower($extension), ['pdf']))
																	{{-- Display PDF --}}
																	<a href="{{ asset('storage/' . $panduan->nama_file) }}" target="_blank">View PDF</a>
																@else
																	{{-- Handle other file types --}}
																	<p>File type not supported</p>
																@endif
															@else
																No File Available
															@endif
														</div>
														@endif
													</div>
													<!--end::Wrapper-->
													<!--begin::Description-->
													<div class="fs-5 fw-bold text-gray-600">
														<!--begin::Text-->
														<p class="mb-8">{{ $panduan->desc1 }}</p>
														<!--end::Text-->
														<!--begin::Text-->
														<p class="mb-8">{{ $panduan->desc2 }}</p>
														<!--end::Text-->
														<!--begin::Text-->
														<p class="mb-8">{{ $panduan->desc3 }}</p>
														<!--end::Text-->
														<!--begin::Text-->
														<p class="mb-8">{{ $panduan->desc4 }}</p>
														<!--end::Text-->
														<!--begin::Text-->
														<p class="mb-8">{{ $panduan->desc5 }}</p>
														<!--end::Text-->
													</div>
													<!--end::Description-->
													
													<!--begin::Icons-->
													<div class="d-flex flex-start">
														<a href="{{ route('userPanduan') }}" class="btn btn-secondary">
															<span class="indicator-label">
																Kembali
															</span>
														</a>
													</div>
													<!--end::Icons-->
												</div>
												<!--end::Post content-->
											</div>
											<!--end::Content-->
										</div>
										<!--end::Layout-->
									</div>
									<!--end::Body-->
								</div>
								<!--end::Post card-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->
					</div>
                    <script>

                    </script>
@endsection

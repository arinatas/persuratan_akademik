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
														@if ($panduan->desc1)
															<div class="fs-5 fw-bold text-gray-600 mt-8">
																<p class="mb-8">{!! nl2br(e($panduan->desc1)) !!}</p>
															</div>
														@endif
														<div class="overlay mt-8">
															<!--begin::Image-->
															@php
																$extension = pathinfo($panduan->gambar1, PATHINFO_EXTENSION);
															@endphp
															@if ($panduan->gambar1)
																@if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']))
																	{{-- Display image --}}
															
																	<div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-350px" style="background-image:url('{{ asset('storage/' . $panduan->gambar1) }}')"></div>

																@else
																	{{-- Handle other file types --}}
																	<p>File type not supported</p>
																@endif
															@endif
															<!--end::Image-->
														</div>
														@if ($panduan->ket_gambar_1)
														<div class="fs-5 fw-bold text-dark-600 text-center">
															<p class="mt-3">{{ $panduan->ket_gambar_1 }}</p>
														</div>
														@endif
														<!--end::Container-->
														<!--begin::Container-->
														@if ($panduan->desc2)
														<div class="fs-5 fw-bold text-gray-600 mt-8">
															<p class="mb-8">{!! nl2br(e($panduan->desc2)) !!}</p>
														</div>
														@endif
														<div class="overlay mt-8">
															<!--begin::Image-->
															@php
																$extension = pathinfo($panduan->gambar2, PATHINFO_EXTENSION);
															@endphp
															@if ($panduan->gambar2)
																@if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']))
																	{{-- Display image --}}
															
																	<div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-350px" style="background-image:url('{{ asset('storage/' . $panduan->gambar2) }}')"></div>

																@else
																	{{-- Handle other file types --}}
																	<p>File type not supported</p>
																@endif
															@else
																
															@endif
															<!--end::Image-->
														</div>
														@if ($panduan->ket_gambar_2)
														<div class="fs-5 fw-bold text-dark-600 text-center">
															<p class="mt-3">{{ $panduan->ket_gambar_2 }}</p>
														</div>
														@endif
														<!--end::Container-->
														<!--begin::Container-->
														@if ($panduan->desc3)
														<div class="fs-5 fw-bold text-gray-600 mt-8">
															<p class="mb-8">{!! nl2br(e($panduan->desc3)) !!}</p>
														</div>
														@endif
														<div class="overlay mt-8">
															<!--begin::Image-->
															@php
																$extension = pathinfo($panduan->gambar3, PATHINFO_EXTENSION);
															@endphp
															@if ($panduan->gambar3)
																@if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']))
																	{{-- Display image --}}
															
																	<div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-350px" style="background-image:url('{{ asset('storage/' . $panduan->gambar3) }}')"></div>

																@else
																	{{-- Handle other file types --}}
																	<p>File type not supported</p>
																@endif
															@else
																
															@endif
															<!--end::Image-->
														</div>
														@if ($panduan->ket_gambar_3)
														<div class="fs-5 fw-bold text-dark-600 text-center">
															<p class="mt-3">{{ $panduan->ket_gambar_3 }}</p>
														</div>
														@endif
														<!--end::Container-->
														<!--begin::Container-->
														@if ($panduan->desc4)
														<div class="fs-5 fw-bold text-gray-600 mt-8">
															<p class="mb-8">{!! nl2br(e($panduan->desc4)) !!}</p>
														</div>
														@endif
														<div class="overlay mt-8">
															<!--begin::Image-->
															@php
																$extension = pathinfo($panduan->gambar4, PATHINFO_EXTENSION);
															@endphp
															@if ($panduan->gambar4)
																@if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']))
																	{{-- Display image --}}
															
																	<div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-350px" style="background-image:url('{{ asset('storage/' . $panduan->gambar4) }}')"></div>

																@else
																	{{-- Handle other file types --}}
																	<p>File type not supported</p>
																@endif
															@else
																
															@endif
															<!--end::Image-->
														</div>
														@if ($panduan->ket_gambar_4)
														<div class="fs-5 fw-bold text-dark-600 text-center">
															<p class="mt-3">{{ $panduan->ket_gambar_4 }}</p>
														</div>
														@endif
														<!--end::Container-->
														<!--begin::Container-->
														@if ($panduan->desc5)
														<div class="fs-5 fw-bold text-gray-600 mt-8">
															<p class="mb-8">{!! nl2br(e($panduan->desc5)) !!}</p>
														</div>
														@endif
														<div class="overlay mt-8">
															<!--begin::Image-->
															@php
																$extension = pathinfo($panduan->gambar5, PATHINFO_EXTENSION);
															@endphp
															@if ($panduan->gambar5)
																@if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']))
																	{{-- Display image --}}
															
																	<div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-350px" style="background-image:url('{{ asset('storage/' . $panduan->gambar5) }}')"></div>

																@else
																	{{-- Handle other file types --}}
																	<p>File type not supported</p>
																@endif
															@else
																
															@endif
															<!--end::Image-->
														</div>
														@if ($panduan->ket_gambar_5)
														<div class="fs-5 fw-bold text-dark-600 text-center">
															<p class="mt-3">{{ $panduan->ket_gambar_5 }}</p>
														</div>
														@endif
														<!--end::Container-->
														<!--begin::Container-->
														@if ($panduan->desc6)
														<div class="fs-5 fw-bold text-gray-600 mt-8">
															<p class="mb-8">{!! nl2br(e($panduan->desc6)) !!}</p>
														</div>
														@endif
														<div class="overlay mt-8">
															<!--begin::Image-->
															@php
																$extension = pathinfo($panduan->gambar6, PATHINFO_EXTENSION);
															@endphp
															@if ($panduan->gambar6)
																@if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']))
																	{{-- Display image --}}
															
																	<div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-350px" style="background-image:url('{{ asset('storage/' . $panduan->gambar6) }}')"></div>

																@else
																	{{-- Handle other file types --}}
																	<p>File type not supported</p>
																@endif
															@else
																
															@endif
															<!--end::Image-->
														</div>
														@if ($panduan->ket_gambar_6)
														<div class="fs-5 fw-bold text-dark-600 text-center">
															<p class="mt-3">{{ $panduan->ket_gambar_6 }}</p>
														</div>
														@endif
														<!--end::Container-->
														<!--begin::Container-->
														@if ($panduan->desc7)
														<div class="fs-5 fw-bold text-gray-600 mt-8">
															<p class="mb-8">{!! nl2br(e($panduan->desc7)) !!}</p>
														</div>
														@endif
														<div class="overlay mt-8">
															<!--begin::Image-->
															@php
																$extension = pathinfo($panduan->gambar7, PATHINFO_EXTENSION);
															@endphp
															@if ($panduan->gambar7)
																@if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']))
																	{{-- Display image --}}
															
																	<div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-350px" style="background-image:url('{{ asset('storage/' . $panduan->gambar7) }}')"></div>

																@else
																	{{-- Handle other file types --}}
																	<p>File type not supported</p>
																@endif
															@else
																
															@endif
															<!--end::Image-->
														</div>
														@if ($panduan->ket_gambar_7)
														<div class="fs-5 fw-bold text-dark-600 text-center">
															<p class="mt-3">{{ $panduan->ket_gambar_7 }}</p>
														</div>
														@endif
														<!--end::Container-->
														<!--begin::Container-->
														@if ($panduan->desc8)
														<div class="fs-5 fw-bold text-gray-600 mt-8">
															<p class="mb-8">{!! nl2br(e($panduan->desc8)) !!}</p>
														</div>
														@endif
														<div class="overlay mt-8">
															<!--begin::Image-->
															@php
																$extension = pathinfo($panduan->gambar8, PATHINFO_EXTENSION);
															@endphp
															@if ($panduan->gambar8)
																@if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']))
																	{{-- Display image --}}
															
																	<div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-350px" style="background-image:url('{{ asset('storage/' . $panduan->gambar8) }}')"></div>

																@else
																	{{-- Handle other file types --}}
																	<p>File type not supported</p>
																@endif
															@else
																
															@endif
															<!--end::Image-->
														</div>
														@if ($panduan->ket_gambar_8)
														<div class="fs-5 fw-bold text-dark-600 text-center">
															<p class="mt-3">{{ $panduan->ket_gambar_8 }}</p>
														</div>
														@endif
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
																
															@endif
														</div>
														@endif
													</div>
													<!--end::Wrapper-->
													<!--begin::Description-->
													<!-- <div class="fs-5 fw-bold text-gray-600">
														<p class="mb-8">{!! nl2br(e($panduan->desc1)) !!}</p>
														<p class="mb-8">{!! nl2br(e($panduan->desc2)) !!}</p>
														<p class="mb-8">{!! nl2br(e($panduan->desc3)) !!}</p>
														<p class="mb-8">{!! nl2br(e($panduan->desc4)) !!}</p>
														<p class="mb-8">{!! nl2br(e($panduan->desc5)) !!}</p>
														<p class="mb-8">{!! nl2br(e($panduan->desc6)) !!}</p>
														<p class="mb-8">{!! nl2br(e($panduan->desc7)) !!}</p>
														<p class="mb-8">{!! nl2br(e($panduan->desc8)) !!}</p>
													</div> -->
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

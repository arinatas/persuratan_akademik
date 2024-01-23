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
								<!--begin::Timeline-->
								<div class="card">
									<!--begin::Card head-->
									<div class="card-header card-header-stretch">
										<!--begin::Title-->
										<div class="card-title d-flex align-items-center">
											<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
											<span class="svg-icon svg-icon-1 svg-icon-primary me-3 lh-0"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Communication/Clipboard-list.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"/>
													<path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
													<path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
													<rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"/>
													<rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"/>
													<rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"/>
													<rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"/>
													<rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"/>
													<rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"/>
												</g>
											</svg><!--end::Svg Icon--></span>
											<!--end::Svg Icon-->
											<h3 class="fw-bolder m-0 text-gray-800">Pengumuman</h3>
										</div>
										<!--end::Title-->
										<!--begin::Toolbar-->
										<div class="card-toolbar m-0">
											<!--begin::Tab nav-->
											<ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0 fw-bolder" role="tablist">
												<li class="nav-item" role="presentation">
													<a id="kt_activity_today_tab" class="nav-link justify-content-center text-active-gray-800 active" data-bs-toggle="tab" role="tab" href="#kt_activity_today">Today</a>
												</li>
											</ul>
											<!--end::Tab nav-->
										</div>
										<!--end::Toolbar-->
									</div>
									<!--end::Card head-->
									<!--begin::Card body-->
									<div class="card-body">
										<!--begin::Tab Content-->
										<div class="tab-content">
											<!--begin::Tab panel-->
											<div id="kt_activity_today" class="card-body p-0 tab-pane fade show active" role="tabpanel" aria-labelledby="kt_activity_today_tab">
												<!--begin::Timeline-->
												@if ($pengumumanHariIni)
												@foreach ($pengumumanHariIni as $item)
													<a href="{{ url('userPengumuman', $item->id ) }}" class="timeline">
														<!--begin::Timeline item-->
														<div class="timeline-item">
															<!--begin::Timeline line-->
															<div class="timeline-line w-40px"></div>
															<!--end::Timeline line-->
															<!--begin::Timeline icon-->
															<div class="timeline-icon symbol symbol-circle symbol-40px">
																<div class="symbol-label bg-light">
																	<!--begin::Svg Icon | path: icons/duotune/communication/com009.svg-->
																	@if ( $item->status_pin == 1 )
																	<span class="svg-icon svg-icon-2 svg-icon-danger">
																		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																			<path opacity="0.3" d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z" fill="black" />
																			<path d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z" fill="black" />
																		</svg>
																	</span>
																	@else
																	<span class="svg-icon svg-icon-2 svg-icon-gray-500">
																		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																			<path opacity="0.3" d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z" fill="black" />
																			<path d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z" fill="black" />
																		</svg>
																	</span>
																	@endif
																	<!--end::Svg Icon-->
																</div>
															</div>
															<!--end::Timeline icon-->
															<!--begin::Timeline content-->
															<div class="timeline-content mb-10 mt-n2">
																<!--begin::Timeline heading-->
																<div class="overflow-auto pe-3">
																	<!--begin::Title-->
																	<div class="fs-5 fw-bold mb-2">{{ $item->judul }}</div>
																	<!--end::Title-->
																	<!--begin::Description-->
																	<div class="d-flex align-items-center mt-1 fs-6">
																		<!--begin::Info-->
																		<div class="text-muted me-2 fs-7">{{ \Illuminate\Support\Str::limit($item->desc1, 150) }}</div>
																		<!--end::Info-->
																	</div>
																	<!--end::Description-->
																</div>
																<!--end::Timeline heading-->
															</div>
															<!--end::Timeline content-->
														</div>
														<!--end::Timeline item-->
													</a>
												@endforeach
												@else
												<h1>Kosong</h1>
												@endif
												<!--end::Timeline-->
												{{ $pengumumanHariIni->links() }}
											</div>
											<!--end::Tab panel-->
										</div>
										<!--end::Tab Content-->
									</div>
									<!--end::Card body-->
								</div>
								<!--end::Timeline-->
								<!--end::Card-->
								<!--begin::Card-->
								<div class="card">
									<!--begin::Card body-->
									<div class="card-body pb-0">
										<!--begin::Heading-->
										<!--begin::Row-->
										<div class="row g-5 g-xl-8">
											<div class="col-xl-4">
												<!--begin::Statistics Widget 5-->
												<a href="{{ url('userSuratMagangMBKM') }}" class="card bg-info hoverable card-xl-stretch mb-xl-8">
													<!--begin::Body-->
													<div class="card-body">
														<span class="svg-icon svg-icon-white svg-icon-3x ms-n1"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Shopping/Money.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24"/>
																<path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z" fill="#000000" opacity="0.3" transform="translate(11.500000, 12.000000) rotate(-345.000000) translate(-11.500000, -12.000000) "/>
																<path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z M11.5,14 C12.6045695,14 13.5,13.1045695 13.5,12 C13.5,10.8954305 12.6045695,10 11.5,10 C10.3954305,10 9.5,10.8954305 9.5,12 C9.5,13.1045695 10.3954305,14 11.5,14 Z" fill="#000000"/>
															</g>
														</svg><!--end::Svg Icon--></span>
														<!--end::Svg Icon-->
														<div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ $suratMBKM }}</div>
														<div class="fw-bold text-white">Surat Permohonan Magang MBKM</div>
													</div>
													<!--end::Body-->
												</a>
												<!--end::Statistics Widget 5-->
											</div>
											<div class="col-xl-4">
												<!--begin::Statistics Widget 5-->
												<a href="{{ url('userSuratSurveyMatkul') }}" class="card bg-success hoverable card-xl-stretch mb-xl-8">
													<!--begin::Body-->
													<div class="card-body">
														<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
														<span class="svg-icon svg-icon-white svg-icon-3x ms-n1"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Shopping/Wallet.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24"/>
																<circle fill="#000000" opacity="0.3" cx="20.5" cy="12.5" r="1.5"/>
																<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 6.500000) rotate(-15.000000) translate(-12.000000, -6.500000) " x="3" y="3" width="18" height="7" rx="1"/>
																<path d="M22,9.33681558 C21.5453723,9.12084552 21.0367986,9 20.5,9 C18.5670034,9 17,10.5670034 17,12.5 C17,14.4329966 18.5670034,16 20.5,16 C21.0367986,16 21.5453723,15.8791545 22,15.6631844 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,9.33681558 Z" fill="#000000"/>
															</g>
														</svg><!--end::Svg Icon--></span>
														<!--end::Svg Icon-->
														<div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ $suratSurveyMatkul }}</div>
														<div class="fw-bold text-white">Surat Izin Survei Matakuliah</div>
													</div>
													<!--end::Body-->
												</a>
												<!--end::Statistics Widget 5-->
											</div>
											<div class="col-xl-4">
												<!--begin::Statistics Widget 5-->
												<a href="{{ url('userSuratKetKuliah') }}" class="card bg-primary hoverable card-xl-stretch mb-5 mb-xl-8">
													<!--begin::Body-->
													<div class="card-body">
														<!--begin::Svg Icon | path: icons/duotune/graphs/gra005.svg-->
														<span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path opacity="0.3" d="M14 12V21H10V12C10 11.4 10.4 11 11 11H13C13.6 11 14 11.4 14 12ZM7 2H5C4.4 2 4 2.4 4 3V21H8V3C8 2.4 7.6 2 7 2Z" fill="black" />
																<path d="M21 20H20V16C20 15.4 19.6 15 19 15H17C16.4 15 16 15.4 16 16V20H3C2.4 20 2 20.4 2 21C2 21.6 2.4 22 3 22H21C21.6 22 22 21.6 22 21C22 20.4 21.6 20 21 20Z" fill="black" />
															</svg>
														</span>
														<!--end::Svg Icon-->
														<div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ $suratKeteranganKuliah }}</div>
														<div class="fw-bold text-white">Surat Keterangan Aktif Kuliah</div>
													</div>
													<!--end::Body-->
												</a>
												<!--end::Statistics Widget 5-->
											</div>
											<div class="col-xl-4">
												<!--begin::Statistics Widget 5-->
												<a href="{{ url('userSuratSurveyProposal') }}" class="card bg-danger hoverable card-xl-stretch mb-xl-8">
													<!--begin::Body-->
													<div class="card-body">
														<span class="svg-icon svg-icon-white svg-icon-3x ms-n1"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Shopping/Money.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24"/>
																<path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z" fill="#000000" opacity="0.3" transform="translate(11.500000, 12.000000) rotate(-345.000000) translate(-11.500000, -12.000000) "/>
																<path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z M11.5,14 C12.6045695,14 13.5,13.1045695 13.5,12 C13.5,10.8954305 12.6045695,10 11.5,10 C10.3954305,10 9.5,10.8954305 9.5,12 C9.5,13.1045695 10.3954305,14 11.5,14 Z" fill="#000000"/>
															</g>
														</svg><!--end::Svg Icon--></span>
														<!--end::Svg Icon-->
														<div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ $suratSurveyProposal }}</div>
														<div class="fw-bold text-white">Surat Izin Survei Proposal Skripsi</div>
													</div>
													<!--end::Body-->
												</a>
												<!--end::Statistics Widget 5-->
											</div>
											<div class="col-xl-4">
												<!--begin::Statistics Widget 5-->
												<a href="{{ url('userSuratSurveySkripsi') }}" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
													<!--begin::Body-->
													<div class="card-body">
														<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
														<span class="svg-icon svg-icon-white svg-icon-3x ms-n1"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Shopping/Wallet.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24"/>
																<circle fill="#000000" opacity="0.3" cx="20.5" cy="12.5" r="1.5"/>
																<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 6.500000) rotate(-15.000000) translate(-12.000000, -6.500000) " x="3" y="3" width="18" height="7" rx="1"/>
																<path d="M22,9.33681558 C21.5453723,9.12084552 21.0367986,9 20.5,9 C18.5670034,9 17,10.5670034 17,12.5 C17,14.4329966 18.5670034,16 20.5,16 C21.0367986,16 21.5453723,15.8791545 22,15.6631844 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,9.33681558 Z" fill="#000000"/>
															</g>
														</svg><!--end::Svg Icon--></span>
														<!--end::Svg Icon-->
														<div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ $suratSurveySkripsi }}</div>
														<div class="fw-bold text-white">Surat Izin Survei Skripsi</div>
													</div>
													<!--end::Body-->
												</a>
												<!--end::Statistics Widget 5-->
											</div>
											<div class="col-xl-4">
												<!--begin::Statistics Widget 5-->
												<a href="{{ url('userSuratPermohonanData') }}" class="card bg-warning hoverable card-xl-stretch mb-5 mb-xl-8">
													<!--begin::Body-->
													<div class="card-body">
														<!--begin::Svg Icon | path: icons/duotune/graphs/gra005.svg-->
														<span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path opacity="0.3" d="M14 12V21H10V12C10 11.4 10.4 11 11 11H13C13.6 11 14 11.4 14 12ZM7 2H5C4.4 2 4 2.4 4 3V21H8V3C8 2.4 7.6 2 7 2Z" fill="black" />
																<path d="M21 20H20V16C20 15.4 19.6 15 19 15H17C16.4 15 16 15.4 16 16V20H3C2.4 20 2 20.4 2 21C2 21.6 2.4 22 3 22H21C21.6 22 22 21.6 22 21C22 20.4 21.6 20 21 20Z" fill="black" />
															</svg>
														</span>
														<!--end::Svg Icon-->
														<div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ $suratPermohonanData }}</div>
														<div class="fw-bold text-white">Surat Permohonan Permintaan Data</div>
													</div>
													<!--end::Body-->
												</a>
												<!--end::Statistics Widget 5-->
											</div>
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

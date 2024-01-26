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
						<h3 class="fw-bolder m-0 text-gray-800">Link Informasi Akademik</h3>
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
								<a href="https://siska.primakara.ac.id/" class="timeline" target="_blank">
								    <!--begin::Timeline item-->
									<div class="timeline-item">
										<!--begin::Timeline line-->
										<div class="timeline-line w-40px"></div>
										<!--end::Timeline line-->
										<!--begin::Timeline icon-->
										<div class="timeline-icon symbol symbol-circle symbol-40px">
											<div class="symbol-label bg-light">
												<!--begin::Svg Icon | path: icons/duotune/communication/com009.svg-->
												<span class="svg-icon svg-icon-2 svg-icon-dark">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path opacity="0.3" d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z" fill="black" />
														<path d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z" fill="black" />
												    </svg>
												</span>
												<!--end::Svg Icon-->
											</div>
										</div>
										<!--end::Timeline icon-->
										<!--begin::Timeline content-->
										<div class="timeline-content mb-10 mt-n2">
											<!--begin::Timeline heading-->
												<div class="overflow-auto pe-3">
													<!--begin::Title-->
													<div class="fs-5 fw-bold mb-2">SISKA</div>
													<!--end::Title-->
													<!--begin::Description-->
													<div class="d-flex align-items-center mt-1 fs-6">
													    <!--begin::Info-->
														<div class="text-muted me-2 fs-7">Sistem Informasi Mahasiswa</div>
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

                                <!--begin::Timeline 2-->
								<a href="https://edlink.id/" class="timeline" target="_blank">
								    <!--begin::Timeline item-->
									<div class="timeline-item">
										<!--begin::Timeline line-->
										<div class="timeline-line w-40px"></div>
										<!--end::Timeline line-->
										<!--begin::Timeline icon-->
										<div class="timeline-icon symbol symbol-circle symbol-40px">
											<div class="symbol-label bg-light">
												<!--begin::Svg Icon | path: icons/duotune/communication/com009.svg-->
												<span class="svg-icon svg-icon-2 svg-icon-dark">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path opacity="0.3" d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z" fill="black" />
														<path d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z" fill="black" />
												    </svg>
												</span>
												<!--end::Svg Icon-->
											</div>
										</div>
										<!--end::Timeline icon-->
										<!--begin::Timeline content-->
										<div class="timeline-content mb-10 mt-n2">
											<!--begin::Timeline heading-->
												<div class="overflow-auto pe-3">
													<!--begin::Title-->
													<div class="fs-5 fw-bold mb-2">EDLINK</div>
													<!--end::Title-->
													<!--begin::Description-->
													<div class="d-flex align-items-center mt-1 fs-6">
													    <!--begin::Info-->
														<div class="text-muted me-2 fs-7">Learning Management System (LMS)</div>
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

                                <!--begin::Timeline 3-->
								<a href="https://priska.primakara.ac.id/" class="timeline" target="_blank">
								    <!--begin::Timeline item-->
									<div class="timeline-item">
										<!--begin::Timeline line-->
										<div class="timeline-line w-40px"></div>
										<!--end::Timeline line-->
										<!--begin::Timeline icon-->
										<div class="timeline-icon symbol symbol-circle symbol-40px">
											<div class="symbol-label bg-light">
												<!--begin::Svg Icon | path: icons/duotune/communication/com009.svg-->
												<span class="svg-icon svg-icon-2 svg-icon-dark">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path opacity="0.3" d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z" fill="black" />
														<path d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z" fill="black" />
												    </svg>
												</span>
												<!--end::Svg Icon-->
											</div>
										</div>
										<!--end::Timeline icon-->
										<!--begin::Timeline content-->
										<div class="timeline-content mb-10 mt-n2">
											<!--begin::Timeline heading-->
												<div class="overflow-auto pe-3">
													<!--begin::Title-->
													<div class="fs-5 fw-bold mb-2">PRISKA</div>
													<!--end::Title-->
													<!--begin::Description-->
													<div class="d-flex align-items-center mt-1 fs-6">
													    <!--begin::Info-->
														<div class="text-muted me-2 fs-7">Sistem Informasi Skripsi dan Tugas Akhir</div>
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

                                <!--begin::Timeline 4-->
								<a href="https://prili.primakara.ac.id/" class="timeline" target="_blank">
								    <!--begin::Timeline item-->
									<div class="timeline-item">
										<!--begin::Timeline line-->
										<div class="timeline-line w-40px"></div>
										<!--end::Timeline line-->
										<!--begin::Timeline icon-->
										<div class="timeline-icon symbol symbol-circle symbol-40px">
											<div class="symbol-label bg-light">
												<!--begin::Svg Icon | path: icons/duotune/communication/com009.svg-->
												<span class="svg-icon svg-icon-2 svg-icon-dark">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path opacity="0.3" d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z" fill="black" />
														<path d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z" fill="black" />
												    </svg>
												</span>
												<!--end::Svg Icon-->
											</div>
										</div>
										<!--end::Timeline icon-->
										<!--begin::Timeline content-->
										<div class="timeline-content mb-10 mt-n2">
											<!--begin::Timeline heading-->
												<div class="overflow-auto pe-3">
													<!--begin::Title-->
													<div class="fs-5 fw-bold mb-2">PRILI</div>
													<!--end::Title-->
													<!--begin::Description-->
													<div class="d-flex align-items-center mt-1 fs-6">
													    <!--begin::Info-->
														<div class="text-muted me-2 fs-7">Sistem Informasi Perpustakaan</div>
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

                                <!--begin::Timeline 5-->
								<a href="https://saran.primakara.ac.id/" class="timeline" target="_blank">
								    <!--begin::Timeline item-->
									<div class="timeline-item">
										<!--begin::Timeline line-->
										<div class="timeline-line w-40px"></div>
										<!--end::Timeline line-->
										<!--begin::Timeline icon-->
										<div class="timeline-icon symbol symbol-circle symbol-40px">
											<div class="symbol-label bg-light">
												<!--begin::Svg Icon | path: icons/duotune/communication/com009.svg-->
												<span class="svg-icon svg-icon-2 svg-icon-dark">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path opacity="0.3" d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z" fill="black" />
														<path d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z" fill="black" />
												    </svg>
												</span>
												<!--end::Svg Icon-->
											</div>
										</div>
										<!--end::Timeline icon-->
										<!--begin::Timeline content-->
										<div class="timeline-content mb-10 mt-n2">
											<!--begin::Timeline heading-->
												<div class="overflow-auto pe-3">
													<!--begin::Title-->
													<div class="fs-5 fw-bold mb-2">Saran</div>
													<!--end::Title-->
													<!--begin::Description-->
													<div class="d-flex align-items-center mt-1 fs-6">
													    <!--begin::Info-->
														<div class="text-muted me-2 fs-7">Sistem Informasi Saran Primakara</div>
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

                                <!--begin::Timeline 6-->
								<a href="https://lppm.primakara.ac.id/" class="timeline" target="_blank">
								    <!--begin::Timeline item-->
									<div class="timeline-item">
										<!--begin::Timeline line-->
										<div class="timeline-line w-40px"></div>
										<!--end::Timeline line-->
										<!--begin::Timeline icon-->
										<div class="timeline-icon symbol symbol-circle symbol-40px">
											<div class="symbol-label bg-light">
												<!--begin::Svg Icon | path: icons/duotune/communication/com009.svg-->
												<span class="svg-icon svg-icon-2 svg-icon-dark">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path opacity="0.3" d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z" fill="black" />
														<path d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z" fill="black" />
												    </svg>
												</span>
												<!--end::Svg Icon-->
											</div>
										</div>
										<!--end::Timeline icon-->
										<!--begin::Timeline content-->
										<div class="timeline-content mb-10 mt-n2">
											<!--begin::Timeline heading-->
												<div class="overflow-auto pe-3">
													<!--begin::Title-->
													<div class="fs-5 fw-bold mb-2">LPPM</div>
													<!--end::Title-->
													<!--begin::Description-->
													<div class="d-flex align-items-center mt-1 fs-6">
													    <!--begin::Info-->
														<div class="text-muted me-2 fs-7">Sistem Informasi Publikasi Ilmiah</div>
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

                                <!--begin::Timeline 7-->
								<a href="https://pddikti.kemdikbud.go.id/" class="timeline" target="_blank">
								    <!--begin::Timeline item-->
									<div class="timeline-item">
										<!--begin::Timeline line-->
										<div class="timeline-line w-40px"></div>
										<!--end::Timeline line-->
										<!--begin::Timeline icon-->
										<div class="timeline-icon symbol symbol-circle symbol-40px">
											<div class="symbol-label bg-light">
												<!--begin::Svg Icon | path: icons/duotune/communication/com009.svg-->
												<span class="svg-icon svg-icon-2 svg-icon-dark">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path opacity="0.3" d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z" fill="black" />
														<path d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z" fill="black" />
												    </svg>
												</span>
												<!--end::Svg Icon-->
											</div>
										</div>
										<!--end::Timeline icon-->
										<!--begin::Timeline content-->
										<div class="timeline-content mb-10 mt-n2">
											<!--begin::Timeline heading-->
												<div class="overflow-auto pe-3">
													<!--begin::Title-->
													<div class="fs-5 fw-bold mb-2">Pangkalan Data</div>
													<!--end::Title-->
													<!--begin::Description-->
													<div class="d-flex align-items-center mt-1 fs-6">
													    <!--begin::Info-->
														<div class="text-muted me-2 fs-7">Sistem Informasi (Pangkatan Data) Kemendikbud</div>
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

                                <!--begin::Timeline 8-->
								<a href="https://ijazah.kemdikbud.go.id/" class="timeline" target="_blank">
								    <!--begin::Timeline item-->
									<div class="timeline-item">
										<!--begin::Timeline line-->
										<div class="timeline-line w-40px"></div>
										<!--end::Timeline line-->
										<!--begin::Timeline icon-->
										<div class="timeline-icon symbol symbol-circle symbol-40px">
											<div class="symbol-label bg-light">
												<!--begin::Svg Icon | path: icons/duotune/communication/com009.svg-->
												<span class="svg-icon svg-icon-2 svg-icon-dark">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path opacity="0.3" d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z" fill="black" />
														<path d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z" fill="black" />
												    </svg>
												</span>
												<!--end::Svg Icon-->
											</div>
										</div>
										<!--end::Timeline icon-->
										<!--begin::Timeline content-->
										<div class="timeline-content mb-10 mt-n2">
											<!--begin::Timeline heading-->
												<div class="overflow-auto pe-3">
													<!--begin::Title-->
													<div class="fs-5 fw-bold mb-2">PINSIVIL</div>
													<!--end::Title-->
													<!--begin::Description-->
													<div class="d-flex align-items-center mt-1 fs-6">
													    <!--begin::Info-->
														<div class="text-muted me-2 fs-7">Verifikasi Ijazah Nasional</div>
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

                                <!--begin::Timeline 9-->
								<a href="https://drive.google.com/file/d/12MnB5l0oRNOf6-p2x38slkMv5Bijk_YR/view" class="timeline" target="_blank">
								    <!--begin::Timeline item-->
									<div class="timeline-item">
										<!--begin::Timeline line-->
										<div class="timeline-line w-40px"></div>
										<!--end::Timeline line-->
										<!--begin::Timeline icon-->
										<div class="timeline-icon symbol symbol-circle symbol-40px">
											<div class="symbol-label bg-light">
												<!--begin::Svg Icon | path: icons/duotune/communication/com009.svg-->
												<span class="svg-icon svg-icon-2 svg-icon-dark">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path opacity="0.3" d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z" fill="black" />
														<path d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z" fill="black" />
												    </svg>
												</span>
												<!--end::Svg Icon-->
											</div>
										</div>
										<!--end::Timeline icon-->
										<!--begin::Timeline content-->
										<div class="timeline-content mb-10 mt-n2">
											<!--begin::Timeline heading-->
												<div class="overflow-auto pe-3">
													<!--begin::Title-->
													<div class="fs-5 fw-bold mb-2">XD PRIME</div>
													<!--end::Title-->
													<!--begin::Description-->
													<div class="d-flex align-items-center mt-1 fs-6">
													    <!--begin::Info-->
														<div class="text-muted me-2 fs-7">Font Primakara</div>
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

							</div>
							<!--end::Tab panel-->
						</div>
						<!--end::Tab Content-->
					</div>
					<!--end::Card body-->
				</div>
				<!--end::Timeline-->
				<!--end::Card-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Post-->
	</div>
@endsection

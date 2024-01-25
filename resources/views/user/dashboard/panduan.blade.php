<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../">
		<title>DALA Primakara</title>
		<meta name="description" content="DALA Primakara" />
		<meta name="keywords" content="DALA Primakara" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<meta property="og:locale" content="en_ID" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="DALA Primakara" />
		<meta property="og:site_name" content="DALA Primakara" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="assets/media/logos/smallprimakara.png" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->

		 {{-- sweet alert --}}
		 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" style="" class="header align-items-stretch">
						<!--begin::Container-->
						<div class="container-fluid d-flex align-items-stretch justify-content-between">
						  <!--begin::Mobile logo-->
						  <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
							<a href="/userDashboard" class="d-lg-none">
							  <img alt="Logo" src="assets/media/logos/smallprimakara.png" class="h-30px" />
							</a>
						  </div>
						  <!--end::Mobile logo-->
						  <!--begin::Wrapper-->
						  <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
							<!--begin::Navbar-->
							<div class="d-flex align-items-stretch" id="kt_header_nav">
							  <!--begin::Menu wrapper-->
							  <div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
								<!--begin::Menu-->
								<div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch" id="#kt_header_menu" data-kt-menu="true">
								  <h1 class="mt-6">{{ $title }}</h1>
								</div>
								<!--end::Menu-->
							  </div>
							  <!--end::Menu wrapper-->
							</div>
							<!--end::Navbar-->
							<!--begin::Topbar-->
							<div class="d-flex align-items-stretch flex-shrink-0">
							  <!--begin::Toolbar wrapper-->
							  <div class="d-flex align-items-stretch flex-shrink-0">
								<!--begin::User-->
								@if (auth()->check())
								  <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
									<!--begin::Menu wrapper-->
									<div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
									  <img src="assets/media/avatars/blank.png" alt="user" />
									</div>
									<!--begin::Menu-->
									<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
									  <!--begin::Menu item-->
									  <div class="menu-item px-3">
										<div class="menu-content d-flex align-items-center px-3">
										  <!--begin::Avatar-->
										  <div class="symbol symbol-50px me-5">
											<img alt="Logo" src="assets/media/avatars/blank.png" />
										  </div>
										  <!--end::Avatar-->
										  <!--begin::Username-->
										  <div class="d-flex flex-column">
											<div class="fw-bolder d-flex align-items-center fs-5">{{ auth()->user()->username }}</div>
										  </div>
										  <!--end::Username-->
										</div>
									  </div>
									  <!--end::Menu item-->
									  <!--begin::Menu separator-->
									  <div class="separator my-2"></div>
									  <!--end::Menu separator-->
									  <!--begin::Menu item-->
									  <div class="menu-item px-5">
										<form action="/logout" method="POST">
										  @csrf
										
										<button type="submit" class="dropdown-item menu-link px-5">Sign Out</button>
					  
										</form>
									  </div>
									  <!--end::Menu item-->
									</div>
									<!--end::Menu-->
									<!--end::Menu wrapper-->
								  </div>
								@else
								  <div class="">
									<a href="{{ url('login') }}" type="submit" class="btn btn-sm btn-primary mt-4">Login</a>
								  </div>
								@endif
								
								<!--end::User -->
							  </div>
							  <!--end::Toolbar wrapper-->
							</div>
							<!--end::Topbar-->
						  </div>
						  <!--end::Wrapper-->
						</div>
						<!--end::Container-->
					  </div>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Toolbar-->
                          @include('partials.toolbar')
						<!--end::Toolbar-->
						<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
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
																<span class="fw-bolder text-gray-400">Panduan</span>
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
							<!--end::Container-->
						</div>
						<!--end::Post-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
                        @include('partials.footer')
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--begin::Drawers-->

		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
				</svg>
			</span>
			<!--end::Svg Icon-->
		</div>
		<!--end::Scrolltop-->
		<!--end::Main-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="assets/js/custom/widgets.js"></script>
		<script src="assets/js/custom/apps/chat/chat.js"></script>
		<script src="assets/js/custom/modals/create-app.js"></script>
		<script src="assets/js/custom/modals/upgrade-plan.js"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
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
                                <!--begin::Card-->
                                <div class="card">
                                    <!--begin::Card body-->
                                    <div class="card-body pb-5">
                                        <!-- Tampilan Search -->
                                        <div class="card-px mt-5">
                                            <form action="{{ route('userPanduan') }}" method="GET">
                                                <div class="input-group row justify-content-center">
                                                    <div class="col-lg-12">
                                                        <h2 class="fs-2x fw-bolder text-center mb-10">{{ $title }}</h2>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" name="search" placeholder="Search Panduan Berdasarkan Judul / Deskripsi" value="{{ request('search') }}">
                                                    </div>
                                                    <div class="col-sm-2 d-none d-sm-block d-md-block d-lg-block">
                                                        <button type="submit" class="btn btn-success" style="width: 100px;">Search</button>
                                                    </div>
                                                    <div class="col-lg-12 d-block d-sm-none mt-5" style="text-align: center;">
                                                        <button type="submit" class="btn btn-success" style="width: 100px;">Search</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- End Tampilan Search -->
                                        <!--begin::Table-->
                                        @if ($panduans )
                                        <!--begin::Row-->
                                        <div class="row mt-5 g-5 g-xl-8">
                                            @foreach ($jenisPanduans as $jenisPanduan)
                                            <div class="col-xl-4">
                                                <!--begin::Statistics Widget 1-->
                                                <div class="card bgi-no-repeat card-xl-stretch mb-xl-8" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-2.svg)">
                                                    <!--begin::Body-->
                                                    <div class="card-body">
                                                        <h2 class="card-title fw-bolder text-dark fs-2">{{ $jenisPanduan->nama }}</h2>
                                                        <br>
                                                        @foreach ($panduans as $item)
                                                            @if ($jenisPanduan->id == $item->jenis_panduan)
                                                            <p> > <a href="{{ url('panduanDetails', $item->id) }}" class="text-dark-75 fw-bold fs-5 m-0">{{ $item->judul }}</a></p>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                                <!--end::Statistics Widget 1-->
                                            </div>
                                            @endforeach
                                        </div>
                                        <!--end::Row-->
                                        @else
                                        <div class="my-10 mx-15">
                                            <!--begin::Notice-->
                                            <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                                                <!--begin::Icon-->
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                                                <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="black" />
                                                        <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <!--end::Icon-->
                                                <!--begin::Wrapper-->
                                                <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                                    <!--begin::Content-->
                                                    <div class="mb-3 mb-md-0 fw-bold">
                                                        <h4 class="text-gray-900 fw-bolder">Belum ada data</h4>
                                                        <div class="fs-6 text-gray-700 pe-7">Belum ada data yang diinputkan</div>
                                                    </div>
                                                    <!--end::Content-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Notice-->
                                        </div>
                                        @endif
                                        <!--end::Table-->
										@if (auth()->check())
											<!--begin::Icons-->
											<div class="d-flex flex-center mb-10">
												<a href="{{ route('userDashboard') }}" class="btn btn-secondary">
													<span class="indicator-label">
														Kembali
													</span>
												</a>
											</div>
											<!--end::Icons-->
										@endif
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
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
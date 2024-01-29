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
                                    <div class="card-body pb-5">
                                        <!-- Tampilan Search -->
                                        <div class="card-px mt-5">
                                            <form action="{{ route('userPanduan') }}" method="GET">
                                                <div class="input-group row justify-content-center">
                                                    <div class="col-lg-12">
                                                        <h2 class="fs-2x fw-bolder text-center mb-10">{{ $title }}</h2>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" name="search" placeholder="Cari Informasi Berdasarkan Judul / Deskripsi" value="{{ request('search') }}">
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
                                        @if ($jenisPanduans)
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
                                                        @foreach($jenisPanduan->panduans as $item)
                                                            <p> > <a href="{{ url('panduanDetails', $item->id) }}" class="text-dark-75 fw-bold fs-5 m-0">{{ $item->judul }}</a></p>
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
						</div>
						<!--end::Post-->
					</div>
                    <script>

                    </script>
@endsection

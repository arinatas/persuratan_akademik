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
						<!--begin::Heading-->
						<div class="card-px pt-10">
							<!--begin::Title-->
							<div class="row">
								<div class="col">
									<h2 class="fs-2x fw-bolder mb-0">Edit {{ $title }}</h2>
								</div>
							</div>
							<!--end::Title-->
						</div>
						<!--end::Heading-->
						<!--begin::Table-->
                        <div class="mt-15">
                            <form action="{{ route('update.suratSurveySkripsi', $suratSurveySkripsi->id ) }}" method="POST">
                                @csrf
                                <div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">Nomor Surat</label>
                                    <input type="text" value="{{$suratSurveySkripsi->nomor}}" class="form-control form-control-solid" name="nomor"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">Ditujukan Kepada</label>
                                    <input type="text" value="{{$suratSurveySkripsi->yth}}" class="form-control form-control-solid" required name="yth"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">Topik</label>
                                    <input type="text" value="{{$suratSurveySkripsi->topik}}" class="form-control form-control-solid" required name="topik"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">NIM 1</label>
                                    <input type="text" value="{{$suratSurveySkripsi->nim1}}" class="form-control form-control-solid" required name="nim1"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">Nama 1</label>
                                    <input type="text" value="{{$suratSurveySkripsi->nama1}}" class="form-control form-control-solid" required name="nama1"/>
                                </div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class="required form-label">Prodi 1</label>
									<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="prodi1" required>
										<option value="Informatika" {{ $suratSurveySkripsi->prodi1 == 'Informatika' ? 'selected' : '' }}>Informatika</option>
										<option value="Sistem Informasi" {{ $suratSurveySkripsi->prodi1 == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
										<option value="Sistem Informasi Akutansi" {{ $suratSurveySkripsi->prodi1 == 'Sistem Informasi Akutansi' ? 'selected' : '' }}>Sistem Informasi Akutansi</option>
										<option value="Akutansi" {{ $suratSurveySkripsi->prodi1 == 'Akutansi' ? 'selected' : '' }}>Akutansi</option>
										<option value="Manajemen" {{ $suratSurveySkripsi->prodi1 == 'Manajemen' ? 'selected' : '' }}>Manajemen</option>
										<option value="DKV" {{ $suratSurveySkripsi->prodi1 == 'DKV' ? 'selected' : '' }}>DKV</option>
										<option value="Bisnis Digital" {{ $suratSurveySkripsi->prodi1 == 'Bisnis Digital' ? 'selected' : '' }}>Bisnis Digital</option>
									</select>
								</div>

								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">NIM 2</label>
                                    <input type="text" value="{{$suratSurveySkripsi->nim2}}" class="form-control form-control-solid" name="nim2"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">Nama 2</label>
                                    <input type="text" value="{{$suratSurveySkripsi->nama2}}" class="form-control form-control-solid" name="nama2"/>
                                </div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class=" form-label">Prodi 2</label>
									<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="prodi2">
										<option value="" {{ is_null($suratSurveySkripsi->prodi2) ? 'selected' : '' }}>Pilih Prodi</option>
										<option value="Informatika" {{ $suratSurveySkripsi->prodi2 == 'Informatika' ? 'selected' : '' }}>Informatika</option>
										<option value="Sistem Informasi" {{ $suratSurveySkripsi->prodi2 == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
										<option value="Sistem Informasi Akutansi" {{ $suratSurveySkripsi->prodi2 == 'Sistem Informasi Akutansi' ? 'selected' : '' }}>Sistem Informasi Akutansi</option>
										<option value="Akutansi" {{ $suratSurveySkripsi->prodi2 == 'Akutansi' ? 'selected' : '' }}>Akutansi</option>
										<option value="Manajemen" {{ $suratSurveySkripsi->prodi2 == 'Manajemen' ? 'selected' : '' }}>Manajemen</option>
										<option value="DKV" {{ $suratSurveySkripsi->prodi2 == 'DKV' ? 'selected' : '' }}>DKV</option>
										<option value="Bisnis Digital" {{ $suratSurveySkripsi->prodi2 == 'Bisnis Digital' ? 'selected' : '' }}>Bisnis Digital</option>
									</select>
								</div>

								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">NIM 3</label>
                                    <input type="text" value="{{$suratSurveySkripsi->nim3}}" class="form-control form-control-solid" name="nim3"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">Nama 3</label>
                                    <input type="text" value="{{$suratSurveySkripsi->nama3}}" class="form-control form-control-solid" name="nama3"/>
                                </div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class=" form-label">Prodi 3</label>
									<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="prodi3">
										<option value="" {{ is_null($suratSurveySkripsi->prodi3) ? 'selected' : '' }}>Pilih Prodi</option>
										<option value="Informatika" {{ $suratSurveySkripsi->prodi3 == 'Informatika' ? 'selected' : '' }}>Informatika</option>
										<option value="Sistem Informasi" {{ $suratSurveySkripsi->prodi3 == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
										<option value="Sistem Informasi Akutansi" {{ $suratSurveySkripsi->prodi3 == 'Sistem Informasi Akutansi' ? 'selected' : '' }}>Sistem Informasi Akutansi</option>
										<option value="Akutansi" {{ $suratSurveySkripsi->prodi3 == 'Akutansi' ? 'selected' : '' }}>Akutansi</option>
										<option value="Manajemen" {{ $suratSurveySkripsi->prodi3 == 'Manajemen' ? 'selected' : '' }}>Manajemen</option>
										<option value="DKV" {{ $suratSurveySkripsi->prodi3 == 'DKV' ? 'selected' : '' }}>DKV</option>
										<option value="Bisnis Digital" {{ $suratSurveySkripsi->prodi3 == 'Bisnis Digital' ? 'selected' : '' }}>Bisnis Digital</option>
									</select>
								</div>

								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">NIM 4</label>
                                    <input type="text" value="{{$suratSurveySkripsi->nim4}}" class="form-control form-control-solid" name="nim4"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">Nama 4</label>
                                    <input type="text" value="{{$suratSurveySkripsi->nama4}}" class="form-control form-control-solid" name="nama4"/>
                                </div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class=" form-label">Prodi 4</label>
									<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="prodi4">
										<option value="" {{ is_null($suratSurveySkripsi->prodi4) ? 'selected' : '' }}>Pilih Prodi</option>
										<option value="Informatika" {{ $suratSurveySkripsi->prodi4 == 'Informatika' ? 'selected' : '' }}>Informatika</option>
										<option value="Sistem Informasi" {{ $suratSurveySkripsi->prodi4 == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
										<option value="Sistem Informasi Akutansi" {{ $suratSurveySkripsi->prodi4 == 'Sistem Informasi Akutansi' ? 'selected' : '' }}>Sistem Informasi Akutansi</option>
										<option value="Akutansi" {{ $suratSurveySkripsi->prodi4 == 'Akutansi' ? 'selected' : '' }}>Akutansi</option>
										<option value="Manajemen" {{ $suratSurveySkripsi->prodi4 == 'Manajemen' ? 'selected' : '' }}>Manajemen</option>
										<option value="DKV" {{ $suratSurveySkripsi->prodi4 == 'DKV' ? 'selected' : '' }}>DKV</option>
										<option value="Bisnis Digital" {{ $suratSurveySkripsi->prodi4 == 'Bisnis Digital' ? 'selected' : '' }}>Bisnis Digital</option>
									</select>
								</div>

								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">NIM 5</label>
                                    <input type="text" value="{{$suratSurveySkripsi->nim5}}" class="form-control form-control-solid" name="nim5"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">Nama 5</label>
                                    <input type="text" value="{{$suratSurveySkripsi->nama5}}" class="form-control form-control-solid" name="nama5"/>
                                </div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class="form-label">Prodi 5</label>
									<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="prodi5">
										<option value="" {{ is_null($suratSurveySkripsi->prodi5) ? 'selected' : '' }}>Pilih Prodi</option>
										<option value="Informatika" {{ $suratSurveySkripsi->prodi5 == 'Informatika' ? 'selected' : '' }}>Informatika</option>
										<option value="Sistem Informasi" {{ $suratSurveySkripsi->prodi5 == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
										<option value="Sistem Informasi Akutansi" {{ $suratSurveySkripsi->prodi5 == 'Sistem Informasi Akutansi' ? 'selected' : '' }}>Sistem Informasi Akutansi</option>
										<option value="Akutansi" {{ $suratSurveySkripsi->prodi5 == 'Akutansi' ? 'selected' : '' }}>Akutansi</option>
										<option value="Manajemen" {{ $suratSurveySkripsi->prodi5 == 'Manajemen' ? 'selected' : '' }}>Manajemen</option>
										<option value="DKV" {{ $suratSurveySkripsi->prodi5 == 'DKV' ? 'selected' : '' }}>DKV</option>
										<option value="Bisnis Digital" {{ $suratSurveySkripsi->prodi5 == 'Bisnis Digital' ? 'selected' : '' }}>Bisnis Digital</option>
									</select>
								</div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">Cantumkan Revisi</label>
                                    <input type="text" value="{{$suratSurveySkripsi->revisi}}" class="form-control form-control-solid" name="revisi"/>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <!--begin::Actions-->
                                    <a href="{{ route('suratSurveySkripsi') }}" class="btn btn-secondary">
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
						<!--end::Table-->
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
		document.getElementById('submit-btn').addEventListener('click', confirmDelete);

		function confirmDelete(event) {
		event.preventDefault();

		Swal.fire({
			title: 'Anda yakin ingin menghapus data ini?',
			text: 'Pastikan semua data sudah benar sebelum menekan tombol OK',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'OK'
		}).then((result) => {
			if (result.isConfirmed) {
			event.target.form.submit();
			}
		});
		}
	</script>
@endsection

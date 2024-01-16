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
                            <form action="{{ route('update.suratSurveyProposal', $suratSurveyProposal->id ) }}" method="POST">
                                @csrf
                                <div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">Nomor Surat</label>
                                    <input type="text" value="{{$suratSurveyProposal->nomor}}" class="form-control form-control-solid" name="nomor"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">Ditujukan Kepada</label>
                                    <input type="text" value="{{$suratSurveyProposal->yth}}" class="form-control form-control-solid" required name="yth"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">Di Tempat</label>
                                    <input type="text" value="{{$suratSurveyProposal->tempat}}" class="form-control form-control-solid" required name="tempat"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">Topik</label>
                                    <input type="text" value="{{$suratSurveyProposal->topik}}" class="form-control form-control-solid" required name="topik"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">NIM 1</label>
                                    <input type="text" value="{{$suratSurveyProposal->nim1}}" class="form-control form-control-solid" required name="nim1"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">Nama 1</label>
                                    <input type="text" value="{{$suratSurveyProposal->nama1}}" class="form-control form-control-solid" required name="nama1"/>
                                </div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class="required form-label">Prodi 1</label>
									<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="prodi1" required>
										<option value="Informatika" {{ $suratSurveyProposal->prodi1 == 'Informatika' ? 'selected' : '' }}>Informatika</option>
										<option value="Sistem Informasi" {{ $suratSurveyProposal->prodi1 == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
										<option value="Sistem Informasi Akutansi" {{ $suratSurveyProposal->prodi1 == 'Sistem Informasi Akutansi' ? 'selected' : '' }}>Sistem Informasi Akutansi</option>
										<option value="Akutansi" {{ $suratSurveyProposal->prodi1 == 'Akutansi' ? 'selected' : '' }}>Akutansi</option>
										<option value="Manajemen" {{ $suratSurveyProposal->prodi1 == 'Manajemen' ? 'selected' : '' }}>Manajemen</option>
										<option value="DKV" {{ $suratSurveyProposal->prodi1 == 'DKV' ? 'selected' : '' }}>DKV</option>
										<option value="Bisnis Digital" {{ $suratSurveyProposal->prodi1 == 'Bisnis Digital' ? 'selected' : '' }}>Bisnis Digital</option>
									</select>
								</div>

								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">NIM 2</label>
                                    <input type="text" value="{{$suratSurveyProposal->nim2}}" class="form-control form-control-solid" name="nim2"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">Nama 2</label>
                                    <input type="text" value="{{$suratSurveyProposal->nama2}}" class="form-control form-control-solid" name="nama2"/>
                                </div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class=" form-label">Prodi 2</label>
									<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="prodi2">
										<option value="" {{ is_null($suratSurveyProposal->prodi2) ? 'selected' : '' }}>Pilih Prodi</option>
										<option value="Informatika" {{ $suratSurveyProposal->prodi2 == 'Informatika' ? 'selected' : '' }}>Informatika</option>
										<option value="Sistem Informasi" {{ $suratSurveyProposal->prodi2 == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
										<option value="Sistem Informasi Akutansi" {{ $suratSurveyProposal->prodi2 == 'Sistem Informasi Akutansi' ? 'selected' : '' }}>Sistem Informasi Akutansi</option>
										<option value="Akutansi" {{ $suratSurveyProposal->prodi2 == 'Akutansi' ? 'selected' : '' }}>Akutansi</option>
										<option value="Manajemen" {{ $suratSurveyProposal->prodi2 == 'Manajemen' ? 'selected' : '' }}>Manajemen</option>
										<option value="DKV" {{ $suratSurveyProposal->prodi2 == 'DKV' ? 'selected' : '' }}>DKV</option>
										<option value="Bisnis Digital" {{ $suratSurveyProposal->prodi2 == 'Bisnis Digital' ? 'selected' : '' }}>Bisnis Digital</option>
									</select>
								</div>

								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">NIM 3</label>
                                    <input type="text" value="{{$suratSurveyProposal->nim3}}" class="form-control form-control-solid" name="nim3"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">Nama 3</label>
                                    <input type="text" value="{{$suratSurveyProposal->nama3}}" class="form-control form-control-solid" name="nama3"/>
                                </div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class=" form-label">Prodi 3</label>
									<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="prodi3">
										<option value="" {{ is_null($suratSurveyProposal->prodi3) ? 'selected' : '' }}>Pilih Prodi</option>
										<option value="Informatika" {{ $suratSurveyProposal->prodi3 == 'Informatika' ? 'selected' : '' }}>Informatika</option>
										<option value="Sistem Informasi" {{ $suratSurveyProposal->prodi3 == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
										<option value="Sistem Informasi Akutansi" {{ $suratSurveyProposal->prodi3 == 'Sistem Informasi Akutansi' ? 'selected' : '' }}>Sistem Informasi Akutansi</option>
										<option value="Akutansi" {{ $suratSurveyProposal->prodi3 == 'Akutansi' ? 'selected' : '' }}>Akutansi</option>
										<option value="Manajemen" {{ $suratSurveyProposal->prodi3 == 'Manajemen' ? 'selected' : '' }}>Manajemen</option>
										<option value="DKV" {{ $suratSurveyProposal->prodi3 == 'DKV' ? 'selected' : '' }}>DKV</option>
										<option value="Bisnis Digital" {{ $suratSurveyProposal->prodi3 == 'Bisnis Digital' ? 'selected' : '' }}>Bisnis Digital</option>
									</select>
								</div>

								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">NIM 4</label>
                                    <input type="text" value="{{$suratSurveyProposal->nim4}}" class="form-control form-control-solid" name="nim4"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">Nama 4</label>
                                    <input type="text" value="{{$suratSurveyProposal->nama4}}" class="form-control form-control-solid" name="nama4"/>
                                </div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class=" form-label">Prodi 4</label>
									<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="prodi4">
										<option value="" {{ is_null($suratSurveyProposal->prodi4) ? 'selected' : '' }}>Pilih Prodi</option>
										<option value="Informatika" {{ $suratSurveyProposal->prodi4 == 'Informatika' ? 'selected' : '' }}>Informatika</option>
										<option value="Sistem Informasi" {{ $suratSurveyProposal->prodi4 == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
										<option value="Sistem Informasi Akutansi" {{ $suratSurveyProposal->prodi4 == 'Sistem Informasi Akutansi' ? 'selected' : '' }}>Sistem Informasi Akutansi</option>
										<option value="Akutansi" {{ $suratSurveyProposal->prodi4 == 'Akutansi' ? 'selected' : '' }}>Akutansi</option>
										<option value="Manajemen" {{ $suratSurveyProposal->prodi4 == 'Manajemen' ? 'selected' : '' }}>Manajemen</option>
										<option value="DKV" {{ $suratSurveyProposal->prodi4 == 'DKV' ? 'selected' : '' }}>DKV</option>
										<option value="Bisnis Digital" {{ $suratSurveyProposal->prodi4 == 'Bisnis Digital' ? 'selected' : '' }}>Bisnis Digital</option>
									</select>
								</div>

								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">NIM 5</label>
                                    <input type="text" value="{{$suratSurveyProposal->nim5}}" class="form-control form-control-solid" name="nim5"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">Nama 5</label>
                                    <input type="text" value="{{$suratSurveyProposal->nama5}}" class="form-control form-control-solid" name="nama5"/>
                                </div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class="form-label">Prodi 5</label>
									<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="prodi5">
										<option value="" {{ is_null($suratSurveyProposal->prodi5) ? 'selected' : '' }}>Pilih Prodi</option>
										<option value="Informatika" {{ $suratSurveyProposal->prodi5 == 'Informatika' ? 'selected' : '' }}>Informatika</option>
										<option value="Sistem Informasi" {{ $suratSurveyProposal->prodi5 == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
										<option value="Sistem Informasi Akutansi" {{ $suratSurveyProposal->prodi5 == 'Sistem Informasi Akutansi' ? 'selected' : '' }}>Sistem Informasi Akutansi</option>
										<option value="Akutansi" {{ $suratSurveyProposal->prodi5 == 'Akutansi' ? 'selected' : '' }}>Akutansi</option>
										<option value="Manajemen" {{ $suratSurveyProposal->prodi5 == 'Manajemen' ? 'selected' : '' }}>Manajemen</option>
										<option value="DKV" {{ $suratSurveyProposal->prodi5 == 'DKV' ? 'selected' : '' }}>DKV</option>
										<option value="Bisnis Digital" {{ $suratSurveyProposal->prodi5 == 'Bisnis Digital' ? 'selected' : '' }}>Bisnis Digital</option>
									</select>
								</div>
                                <div class="d-flex justify-content-end">
                                    <!--begin::Actions-->
                                    <a href="{{ route('suratSurveyProposal') }}" class="btn btn-secondary">
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

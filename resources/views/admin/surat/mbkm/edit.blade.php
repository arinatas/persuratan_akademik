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
                            <form action="{{ route('update.suratMbkm', $suratMbkm->id ) }}" method="POST">
                                @csrf
                                <div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">Nomor Surat</label>
                                    <input type="text" value="{{$suratMbkm->nomor}}" class="form-control form-control-solid" name="nomor"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">Ditujukan Kepada</label>
                                    <input type="text" value="{{$suratMbkm->yth}}" class="form-control form-control-solid" required name="yth"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">Di Tempat</label>
                                    <input type="text" value="{{$suratMbkm->tempat}}" class="form-control form-control-solid" required name="tempat"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">Tanggal Mulai</label>
                                    <input type="date" value="{{$suratMbkm->tgl_mulai}}" class="form-control form-control-solid" required name="tgl_mulai"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">Tanggal Selesai</label>
                                    <input type="date" value="{{$suratMbkm->tgl_selesai}}" class="form-control form-control-solid" required name="tgl_selesai"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">NIM 1</label>
                                    <input type="text" value="{{$suratMbkm->nim1}}" class="form-control form-control-solid" required name="nim1"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">Nama 1</label>
                                    <input type="text" value="{{$suratMbkm->nama1}}" class="form-control form-control-solid" required name="nama1"/>
                                </div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class="required form-label">Prodi 1</label>
									<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="prodi1" required>
										<option value="Informatika" {{ $suratMbkm->prodi1 == 'Informatika' ? 'selected' : '' }}>Informatika</option>
										<option value="Sistem Informasi" {{ $suratMbkm->prodi1 == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
										<option value="Sistem Informasi Akutansi" {{ $suratMbkm->prodi1 == 'Sistem Informasi Akutansi' ? 'selected' : '' }}>Sistem Informasi Akutansi</option>
										<option value="Akutansi" {{ $suratMbkm->prodi1 == 'Akutansi' ? 'selected' : '' }}>Akutansi</option>
										<option value="Manajemen" {{ $suratMbkm->prodi1 == 'Manajemen' ? 'selected' : '' }}>Manajemen</option>
										<option value="DKV" {{ $suratMbkm->prodi1 == 'DKV' ? 'selected' : '' }}>DKV</option>
										<option value="Bisnis Digital" {{ $suratMbkm->prodi1 == 'Bisnis Digital' ? 'selected' : '' }}>Bisnis Digital</option>
									</select>
								</div>

								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">NIM 2</label>
                                    <input type="text" value="{{$suratMbkm->nim2}}" class="form-control form-control-solid" name="nim2"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">Nama 2</label>
                                    <input type="text" value="{{$suratMbkm->nama2}}" class="form-control form-control-solid" name="nama2"/>
                                </div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class=" form-label">Prodi 2</label>
									<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="prodi2">
										<option value="" {{ is_null($suratMbkm->prodi2) ? 'selected' : '' }}>Pilih Prodi</option>
										<option value="Informatika" {{ $suratMbkm->prodi2 == 'Informatika' ? 'selected' : '' }}>Informatika</option>
										<option value="Sistem Informasi" {{ $suratMbkm->prodi2 == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
										<option value="Sistem Informasi Akutansi" {{ $suratMbkm->prodi2 == 'Sistem Informasi Akutansi' ? 'selected' : '' }}>Sistem Informasi Akutansi</option>
										<option value="Akutansi" {{ $suratMbkm->prodi2 == 'Akutansi' ? 'selected' : '' }}>Akutansi</option>
										<option value="Manajemen" {{ $suratMbkm->prodi2 == 'Manajemen' ? 'selected' : '' }}>Manajemen</option>
										<option value="DKV" {{ $suratMbkm->prodi2 == 'DKV' ? 'selected' : '' }}>DKV</option>
										<option value="Bisnis Digital" {{ $suratMbkm->prodi2 == 'Bisnis Digital' ? 'selected' : '' }}>Bisnis Digital</option>
									</select>
								</div>

								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">NIM 3</label>
                                    <input type="text" value="{{$suratMbkm->nim3}}" class="form-control form-control-solid" name="nim3"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">Nama 3</label>
                                    <input type="text" value="{{$suratMbkm->nama3}}" class="form-control form-control-solid" name="nama3"/>
                                </div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class=" form-label">Prodi 3</label>
									<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="prodi3">
										<option value="" {{ is_null($suratMbkm->prodi3) ? 'selected' : '' }}>Pilih Prodi</option>
										<option value="Informatika" {{ $suratMbkm->prodi3 == 'Informatika' ? 'selected' : '' }}>Informatika</option>
										<option value="Sistem Informasi" {{ $suratMbkm->prodi3 == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
										<option value="Sistem Informasi Akutansi" {{ $suratMbkm->prodi3 == 'Sistem Informasi Akutansi' ? 'selected' : '' }}>Sistem Informasi Akutansi</option>
										<option value="Akutansi" {{ $suratMbkm->prodi3 == 'Akutansi' ? 'selected' : '' }}>Akutansi</option>
										<option value="Manajemen" {{ $suratMbkm->prodi3 == 'Manajemen' ? 'selected' : '' }}>Manajemen</option>
										<option value="DKV" {{ $suratMbkm->prodi3 == 'DKV' ? 'selected' : '' }}>DKV</option>
										<option value="Bisnis Digital" {{ $suratMbkm->prodi3 == 'Bisnis Digital' ? 'selected' : '' }}>Bisnis Digital</option>
									</select>
								</div>

								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">NIM 4</label>
                                    <input type="text" value="{{$suratMbkm->nim4}}" class="form-control form-control-solid" name="nim4"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">Nama 4</label>
                                    <input type="text" value="{{$suratMbkm->nama4}}" class="form-control form-control-solid" name="nama4"/>
                                </div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class=" form-label">Prodi 4</label>
									<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="prodi4">
										<option value="" {{ is_null($suratMbkm->prodi4) ? 'selected' : '' }}>Pilih Prodi</option>
										<option value="Informatika" {{ $suratMbkm->prodi4 == 'Informatika' ? 'selected' : '' }}>Informatika</option>
										<option value="Sistem Informasi" {{ $suratMbkm->prodi4 == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
										<option value="Sistem Informasi Akutansi" {{ $suratMbkm->prodi4 == 'Sistem Informasi Akutansi' ? 'selected' : '' }}>Sistem Informasi Akutansi</option>
										<option value="Akutansi" {{ $suratMbkm->prodi4 == 'Akutansi' ? 'selected' : '' }}>Akutansi</option>
										<option value="Manajemen" {{ $suratMbkm->prodi4 == 'Manajemen' ? 'selected' : '' }}>Manajemen</option>
										<option value="DKV" {{ $suratMbkm->prodi4 == 'DKV' ? 'selected' : '' }}>DKV</option>
										<option value="Bisnis Digital" {{ $suratMbkm->prodi4 == 'Bisnis Digital' ? 'selected' : '' }}>Bisnis Digital</option>
									</select>
								</div>

								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">NIM 5</label>
                                    <input type="text" value="{{$suratMbkm->nim5}}" class="form-control form-control-solid" name="nim5"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">Nama 5</label>
                                    <input type="text" value="{{$suratMbkm->nama5}}" class="form-control form-control-solid" name="nama5"/>
                                </div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class="form-label">Prodi 5</label>
									<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="prodi5">
										<option value="" {{ is_null($suratMbkm->prodi5) ? 'selected' : '' }}>Pilih Prodi</option>
										<option value="Informatika" {{ $suratMbkm->prodi5 == 'Informatika' ? 'selected' : '' }}>Informatika</option>
										<option value="Sistem Informasi" {{ $suratMbkm->prodi5 == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
										<option value="Sistem Informasi Akutansi" {{ $suratMbkm->prodi5 == 'Sistem Informasi Akutansi' ? 'selected' : '' }}>Sistem Informasi Akutansi</option>
										<option value="Akutansi" {{ $suratMbkm->prodi5 == 'Akutansi' ? 'selected' : '' }}>Akutansi</option>
										<option value="Manajemen" {{ $suratMbkm->prodi5 == 'Manajemen' ? 'selected' : '' }}>Manajemen</option>
										<option value="DKV" {{ $suratMbkm->prodi5 == 'DKV' ? 'selected' : '' }}>DKV</option>
										<option value="Bisnis Digital" {{ $suratMbkm->prodi5 == 'Bisnis Digital' ? 'selected' : '' }}>Bisnis Digital</option>
									</select>
								</div>
                                <div class="d-flex justify-content-end">
                                    <!--begin::Actions-->
                                    <a href="{{ route('suratMbkm') }}" class="btn btn-secondary">
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

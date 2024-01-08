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
                            <form action="{{ route('update.biodata', $biodata->id ) }}" method="POST">
                                @csrf
                                <div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">Nim</label>
                                    <input type="text" value="{{$biodata->nim}}" class="form-control form-control-solid" required name="nim"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">Nama</label>
                                    <input type="text" value="{{$biodata->nama}}" class="form-control form-control-solid" required name="nama"/>
                                </div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class="required form-label">Kelas</label>
									<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="kelas" required>
										<option value="Pagi" {{ $biodata->kelas == 'Pagi' ? 'selected' : '' }}>Pagi</option>
										<option value="Malam" {{ $biodata->kelas == 'Malam' ? 'selected' : '' }}>Malam</option>
									</select>
								</div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class="required form-label">Prodi</label>
									<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="prodi" required>
										<option value="Informatika" {{ $biodata->prodi == 'Informatika' ? 'selected' : '' }}>Informatika</option>
										<option value="Sistem Informasi" {{ $biodata->prodi == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
										<option value="Sistem Informasi Akutansi" {{ $biodata->prodi == 'Sistem Informasi Akutansi' ? 'selected' : '' }}>Sistem Informasi Akutansi</option>
										<option value="Akutansi" {{ $biodata->prodi == 'Akutansi' ? 'selected' : '' }}>Akutansi</option>
										<option value="Manajemen" {{ $biodata->prodi == 'Manajemen' ? 'selected' : '' }}>Manajemen</option>
										<option value="DKV" {{ $biodata->prodi == 'DKV' ? 'selected' : '' }}>DKV</option>
										<option value="Bisnis Digital" {{ $biodata->prodi == 'Bisnis Digital' ? 'selected' : '' }}>Bisnis Digital</option>
									</select>
								</div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class="required form-label">Fakultas</label>
									<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="fakultas" required>
										<option value="Teknologi Informasi & Desain" {{ $biodata->fakultas == 'Teknologi Informasi & Desain' ? 'selected' : '' }}>Teknologi Informasi & Desain</option>
										<option value="Ekonomi & Bisnis" {{ $biodata->fakultas == 'Ekonomi & Bisnis' ? 'selected' : '' }}>Ekonomi & Bisnis</option>
									</select>
								</div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">Angkatan</label>
                                    <input type="text" value="{{$biodata->angkatan}}" class="form-control form-control-solid" required name="angkatan"/>
                                </div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class="required form-label">Dosen PA</label>
									<select class="form-select form-select-solid" data-control="select2" name="dosen_pa" required>
										<option value="">Pilih Dosen PA</option>
										@foreach ($dosenPAs as $dosenPA)
											<option value="{{ $dosenPA->id }}" {{ $biodata->dosen_pa == $dosenPA->id ? 'selected' : '' }}>
												{{ $dosenPA->nama }}
											</option>
										@endforeach
									</select>
								</div>
                                <div class="d-flex justify-content-end">
                                    <!--begin::Actions-->
                                    <a href="{{ route('biodata') }}" class="btn btn-secondary">
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

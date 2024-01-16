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
                            <form action="{{ route('update.suratKeteranganKuliah', $suratKeteranganKuliah->id ) }}" method="POST">
                                @csrf
                                <div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">Nomor Surat</label>
                                    <input type="text" value="{{$suratKeteranganKuliah->nomor}}" class="form-control form-control-solid" name="nomor"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">Nim</label>
                                    <input type="text" value="{{$suratKeteranganKuliah->nim}}" class="form-control form-control-solid" required name="nim"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">Nama Orang Tua</label>
                                    <input type="text" value="{{$suratKeteranganKuliah->nama_ortu}}" class="form-control form-control-solid" required name="nama_ortu"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">Pangkat / Golongan</label>
                                    <input type="text" value="{{$suratKeteranganKuliah->pangkat}}" class="form-control form-control-solid" required name="pangkat"/>
                                </div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class="required form-label">Semester</label>
									<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" name="semester" required>
										<option value="Ganjil" {{ $suratKeteranganKuliah->semester == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
										<option value="Genap" {{ $suratKeteranganKuliah->semester == 'Genap' ? 'selected' : '' }}>Genap</option>
										<option value="SP" {{ $suratKeteranganKuliah->semester == 'SP' ? 'selected' : '' }}>SP</option>
									</select>
								</div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">Tahun Akademik</label>
                                    <input type="text" value="{{$suratKeteranganKuliah->tahun_akademik}}" class="form-control form-control-solid" required name="tahun_akademik"/>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <!--begin::Actions-->
                                    <a href="{{ route('suratKeteranganKuliah') }}" class="btn btn-secondary">
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

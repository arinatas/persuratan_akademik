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
							<form action="{{ route('update.penandaTangan', $penandaTangan->id ) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">NIDN/NIK</label>
                                    <input type="text" value="{{$penandaTangan->nidn}}" class="form-control form-control-solid" required name="nidn"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">Nama</label>
                                    <input type="text" value="{{$penandaTangan->nama}}" class="form-control form-control-solid" required name="nama"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">Jabatan</label>
                                    <input type="text" value="{{$penandaTangan->jabatan}}" class="form-control form-control-solid" required name="jabatan"/>
                                </div>
								<div class="mb-10">
                                    <label class="required form-label">File TTD</label>
                                    @if ($penandaTangan->file_ttd)
                                        <div>
                                            File Saat Ini:
                                            <a href="{{ asset('storage/' . $penandaTangan->file_ttd) }}" alt="File TTD" class="img-fluid mx-auto" target="_blank">
                                                View File
                                            </a>
                                        </div>
                                        <small style="color: red;">Jika Anda ingin memperbarui file, pilih file baru.</small>
                                    @endif
                                    <input type="file" class="form-control form-control-solid" name="file_ttd"/>
                                </div>
								@if($errors->any())
								<div class="alert alert-danger">
									<ul>
										@foreach($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
								@endif
                                <div class="d-flex justify-content-end">
                                    <!--begin::Actions-->
                                    <a href="{{ route('penandaTangan') }}" class="btn btn-secondary">
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

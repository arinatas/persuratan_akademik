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
							<form action="{{ route('update.panduan', $panduan->id ) }}" method="POST" enctype="multipart/form-data">
                                @csrf
								<div class="mb-10">
									<label for="jenis_panduan" class="required form-label">Jenis Panduan</label>
									<select class="form-control form-control-solid" name="jenis_panduan" required>
										<option value="">Pilih Jenis Panduan</option>
										@foreach ($jenisPanduans as $jenisPanduan)
											<option value="{{ $jenisPanduan->id }}" {{ $panduan->jenisPanduan->id == $jenisPanduan->id ? 'selected' : '' }}>
												{{ $jenisPanduan->nama }}
											</option>
										@endforeach
									</select>
								</div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">Judul</label>
                                    <input type="text" value="{{$panduan->judul}}" class="form-control form-control-solid" required name="judul"/>
                                </div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class="required form-label">Paragraf 1</label>
									<textarea class="form-control form-control-solid" required name="desc1" style="height: 300px;">{{$panduan->desc1}}</textarea>
								</div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class=" form-label">Paragraf 2</label>
									<textarea class="form-control form-control-solid"  name="desc2" style="height: 300px;">{{$panduan->desc2}}</textarea>
								</div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class=" form-label">Paragraf 3</label>
									<textarea class="form-control form-control-solid"  name="desc3" style="height: 300px;">{{$panduan->desc3}}</textarea>
								</div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class=" form-label">Paragraf 4</label>
									<textarea class="form-control form-control-solid"  name="desc4" style="height: 300px;">{{$panduan->desc4}}</textarea>
								</div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class=" form-label">Paragraf 5</label>
									<textarea class="form-control form-control-solid"  name="desc5" style="height: 300px;">{{$panduan->desc5}}</textarea>
								</div>
								<div class="mb-10">
                                    <label class=" form-label">Gambar Panduan</label>
                                    @if ($panduan->gambar)
                                        <div>
                                            Gambar Saat Ini:
                                            <a href="{{ asset('storage/' . $panduan->gambar) }}" alt="Gambar Panduan" class="img-fluid mx-auto" target="_blank">
                                                View Gambar
                                            </a>
                                        </div>
                                        <small style="color: red;">Jika Anda ingin memperbarui gambar, pilih gambar baru.</small>
                                    @endif
                                    <input type="file" class="form-control form-control-solid" name="gambar"/>
                                </div>
								<div class="mb-10">
                                    <label class=" form-label">File Panduan</label>
                                    @if ($panduan->nama_file)
                                        <div>
                                            File Saat Ini:
                                            <a href="{{ asset('storage/' . $panduan->nama_file) }}" alt="File Panduan" class="img-fluid mx-auto" target="_blank">
                                                View File
                                            </a>
                                        </div>
                                        <small style="color: red;">Jika Anda ingin memperbarui file, pilih file baru.</small>
                                    @endif
                                    <input type="file" class="form-control form-control-solid" name="nama_file"/>
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
                                    <a href="{{ route('panduan') }}" class="btn btn-secondary">
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

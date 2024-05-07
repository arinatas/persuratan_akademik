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
                                    <label for="exampleFormControlInput1" class="form-label">Sub Judul 1</label>
                                    <input type="text" value="{{$panduan->sub_judul_1}}" class="form-control form-control-solid" name="sub_judul_1"/>
                                </div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class="required form-label">Paragraf 1</label>
									<textarea class="form-control form-control-solid" required name="desc1" style="height: 300px;">{{$panduan->desc1}}</textarea>
								</div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="form-label">Title Gambar 1</label>
                                    <input type="text" value="{{$panduan->ket_gambar_1}}" class="form-control form-control-solid" name="ket_gambar_1"/>
                                </div>
                                <div class="mb-10">
                                    <label class="form-label">Gambar Panduan 1</label>
                                    @if ($panduan->gambar1)
                                        <div>
                                            Gambar Saat Ini:
                                            <a href="{{ asset('storage/' . $panduan->gambar1) }}" alt="Gambar Panduan 1" class="img-fluid mx-auto" target="_blank">
                                                View Gambar
                                            </a>
                                        </div>
                                        <small style="color: red;">Jika Anda ingin memperbarui gambar, pilih gambar baru atau hapus gambar saat ini.</small>
                                        <!-- <button onclick="deleteImage('{{ $panduan->id }}', 'gambar1')">Hapus Gambar</button> -->
                                        <button onclick="deleteImage('{{ $panduan->id }}', 'gambar1')" class="btn btn-danger btn-sm mt-2 mb-3">Hapus Gambar</button>
                                    @endif
                                    <input type="file" class="form-control form-control-solid" name="gambar1"/>
                                </div>
                                <div class="mb-10">
                                    <label for="exampleFormControlInput1" class="form-label">Sub Judul 2</label>
                                    <input type="text" value="{{$panduan->sub_judul_2}}" class="form-control form-control-solid" name="sub_judul_2"/>
                                </div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class=" form-label">Paragraf 2</label>
									<textarea class="form-control form-control-solid"  name="desc2" style="height: 300px;">{{$panduan->desc2}}</textarea>
								</div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="form-label">Title Gambar 2</label>
                                    <input type="text" value="{{$panduan->ket_gambar_2}}" class="form-control form-control-solid" name="ket_gambar_2"/>
                                </div>
								<div class="mb-10">
                                    <label class=" form-label">Gambar Panduan 2</label>
                                    @if ($panduan->gambar2)
                                        <div>
                                            Gambar Saat Ini:
                                            <a href="{{ asset('storage/' . $panduan->gambar2) }}" alt="Gambar Panduan 2" class="img-fluid mx-auto" target="_blank">
                                                View Gambar
                                            </a>
                                        </div>
                                        <small style="color: red;">Jika Anda ingin memperbarui gambar, pilih gambar baru.</small>
                                        <button onclick="deleteImage('{{ $panduan->id }}', 'gambar2')" class="btn btn-danger btn-sm mt-2 mb-3">Hapus Gambar</button>
                                    @endif
                                    <input type="file" class="form-control form-control-solid" name="gambar2"/>
                                </div>
                                <div class="mb-10">
                                    <label for="exampleFormControlInput1" class="form-label">Sub Judul 3</label>
                                    <input type="text" value="{{$panduan->sub_judul_3}}" class="form-control form-control-solid" name="sub_judul_3"/>
                                </div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class=" form-label">Paragraf 3</label>
									<textarea class="form-control form-control-solid"  name="desc3" style="height: 300px;">{{$panduan->desc3}}</textarea>
								</div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="form-label">Title Gambar 3</label>
                                    <input type="text" value="{{$panduan->ket_gambar_3}}" class="form-control form-control-solid" name="ket_gambar_3"/>
                                </div>
								<div class="mb-10">
                                    <label class=" form-label">Gambar Panduan 3</label>
                                    @if ($panduan->gambar3)
                                        <div>
                                            Gambar Saat Ini:
                                            <a href="{{ asset('storage/' . $panduan->gambar3) }}" alt="Gambar Panduan 3" class="img-fluid mx-auto" target="_blank">
                                                View Gambar
                                            </a>
                                        </div>
                                        <small style="color: red;">Jika Anda ingin memperbarui gambar, pilih gambar baru.</small>
                                        <button onclick="deleteImage('{{ $panduan->id }}', 'gambar3')" class="btn btn-danger btn-sm mt-2 mb-3">Hapus Gambar</button>
                                    @endif
                                    <input type="file" class="form-control form-control-solid" name="gambar3"/>
                                </div>
                                <div class="mb-10">
                                    <label for="exampleFormControlInput1" class="form-label">Sub Judul 4</label>
                                    <input type="text" value="{{$panduan->sub_judul_4}}" class="form-control form-control-solid" name="sub_judul_4"/>
                                </div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class=" form-label">Paragraf 4</label>
									<textarea class="form-control form-control-solid"  name="desc4" style="height: 300px;">{{$panduan->desc4}}</textarea>
								</div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="form-label">Title Gambar 4</label>
                                    <input type="text" value="{{$panduan->ket_gambar_4}}" class="form-control form-control-solid" name="ket_gambar_4"/>
                                </div>
								<div class="mb-10">
                                    <label class=" form-label">Gambar Panduan 4</label>
                                    @if ($panduan->gambar4)
                                        <div>
                                            Gambar Saat Ini:
                                            <a href="{{ asset('storage/' . $panduan->gambar4) }}" alt="Gambar Panduan 4" class="img-fluid mx-auto" target="_blank">
                                                View Gambar
                                            </a>
                                        </div>
                                        <small style="color: red;">Jika Anda ingin memperbarui gambar, pilih gambar baru.</small>
                                        <button onclick="deleteImage('{{ $panduan->id }}', 'gambar4')" class="btn btn-danger btn-sm mt-2 mb-3">Hapus Gambar</button>
                                    @endif
                                    <input type="file" class="form-control form-control-solid" name="gambar4"/>
                                </div>
                                <div class="mb-10">
                                    <label for="exampleFormControlInput1" class="form-label">Sub Judul 5</label>
                                    <input type="text" value="{{$panduan->sub_judul_5}}" class="form-control form-control-solid" name="sub_judul_5"/>
                                </div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class=" form-label">Paragraf 5</label>
									<textarea class="form-control form-control-solid"  name="desc5" style="height: 300px;">{{$panduan->desc5}}</textarea>
								</div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="form-label">Title Gambar 5</label>
                                    <input type="text" value="{{$panduan->ket_gambar_5}}" class="form-control form-control-solid" name="ket_gambar_5"/>
                                </div>
								<div class="mb-10">
                                    <label class=" form-label">Gambar Panduan 5</label>
                                    @if ($panduan->gambar5)
                                        <div>
                                            Gambar Saat Ini:
                                            <a href="{{ asset('storage/' . $panduan->gambar5) }}" alt="Gambar Panduan 5" class="img-fluid mx-auto" target="_blank">
                                                View Gambar
                                            </a>
                                        </div>
                                        <small style="color: red;">Jika Anda ingin memperbarui gambar, pilih gambar baru.</small>
                                        <button onclick="deleteImage('{{ $panduan->id }}', 'gambar5')" class="btn btn-danger btn-sm mt-2 mb-3">Hapus Gambar</button>
                                    @endif
                                    <input type="file" class="form-control form-control-solid" name="gambar5"/>
                                </div>
                                <div class="mb-10">
                                    <label for="exampleFormControlInput1" class="form-label">Sub Judul 6</label>
                                    <input type="text" value="{{$panduan->sub_judul_6}}" class="form-control form-control-solid" name="sub_judul_6"/>
                                </div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class=" form-label">Paragraf 6</label>
									<textarea class="form-control form-control-solid"  name="desc6" style="height: 300px;">{{$panduan->desc6}}</textarea>
								</div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="form-label">Title Gambar 6</label>
                                    <input type="text" value="{{$panduan->ket_gambar_6}}" class="form-control form-control-solid" name="ket_gambar_6"/>
                                </div>
								<div class="mb-10">
                                    <label class=" form-label">Gambar Panduan 6</label>
                                    @if ($panduan->gambar6)
                                        <div>
                                            Gambar Saat Ini:
                                            <a href="{{ asset('storage/' . $panduan->gambar6) }}" alt="Gambar Panduan 6" class="img-fluid mx-auto" target="_blank">
                                                View Gambar
                                            </a>
                                        </div>
                                        <small style="color: red;">Jika Anda ingin memperbarui gambar, pilih gambar baru.</small>
                                        <button onclick="deleteImage('{{ $panduan->id }}', 'gambar6')" class="btn btn-danger btn-sm mt-2 mb-3">Hapus Gambar</button>
                                    @endif
                                    <input type="file" class="form-control form-control-solid" name="gambar6"/>
                                </div>
                                <div class="mb-10">
                                    <label for="exampleFormControlInput1" class="form-label">Sub Judul 7</label>
                                    <input type="text" value="{{$panduan->sub_judul_7}}" class="form-control form-control-solid" name="sub_judul_7"/>
                                </div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class=" form-label">Paragraf 7</label>
									<textarea class="form-control form-control-solid"  name="desc7" style="height: 300px;">{{$panduan->desc7}}</textarea>
								</div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="form-label">Title Gambar 7</label>
                                    <input type="text" value="{{$panduan->ket_gambar_7}}" class="form-control form-control-solid" name="ket_gambar_7"/>
                                </div>
								<div class="mb-10">
                                    <label class=" form-label">Gambar Panduan 7</label>
                                    @if ($panduan->gambar7)
                                        <div>
                                            Gambar Saat Ini:
                                            <a href="{{ asset('storage/' . $panduan->gambar7) }}" alt="Gambar Panduan 7" class="img-fluid mx-auto" target="_blank">
                                                View Gambar
                                            </a>
                                        </div>
                                        <small style="color: red;">Jika Anda ingin memperbarui gambar, pilih gambar baru.</small>
                                        <button onclick="deleteImage('{{ $panduan->id }}', 'gambar7')" class="btn btn-danger btn-sm mt-2 mb-3">Hapus Gambar</button>
                                    @endif
                                    <input type="file" class="form-control form-control-solid" name="gambar7"/>
                                </div>
                                <div class="mb-10">
                                    <label for="exampleFormControlInput1" class="form-label">Sub Judul 8</label>
                                    <input type="text" value="{{$panduan->sub_judul_8}}" class="form-control form-control-solid" name="sub_judul_8"/>
                                </div>
								<div class="mb-10">
									<label for="exampleFormControlInput1" class=" form-label">Paragraf 8</label>
									<textarea class="form-control form-control-solid"  name="desc8" style="height: 300px;">{{$panduan->desc8}}</textarea>
								</div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="form-label">Title Gambar 8</label>
                                    <input type="text" value="{{$panduan->ket_gambar_8}}" class="form-control form-control-solid" name="ket_gambar_8"/>
                                </div>
								<div class="mb-10">
                                    <label class=" form-label">Gambar Panduan 8</label>
                                    @if ($panduan->gambar8)
                                        <div>
                                            Gambar Saat Ini:
                                            <a href="{{ asset('storage/' . $panduan->gambar8) }}" alt="Gambar Panduan 8" class="img-fluid mx-auto" target="_blank">
                                                View Gambar
                                            </a>
                                        </div>
                                        <small style="color: red;">Jika Anda ingin memperbarui gambar, pilih gambar baru.</small>
                                        <button onclick="deleteImage('{{ $panduan->id }}', 'gambar8')" class="btn btn-danger btn-sm mt-2 mb-3">Hapus Gambar</button>
                                    @endif
                                    <input type="file" class="form-control form-control-solid" name="gambar8"/>
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
                                        <button onclick="deleteFile('{{ $panduan->id }}')" class="btn btn-danger btn-sm mt-2">Hapus File</button>
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
    <script>
        function deleteImage(itemId, imageName) {
            if (confirm('Anda yakin ingin menghapus gambar ini?')) {
            // Kirim permintaan AJAX ke server untuk menghapus gambar
            $.ajax({
                type: 'POST',
                url: '/delete-image',
                data: {
                    itemId: itemId,
                    imageName: imageName,
                    _token: '{{ csrf_token() }}'
                },
            success: function (response) {
                // Handle response, misalnya, tampilkan pesan bahwa gambar berhasil dihapus
                alert('Gambar berhasil dihapus');
                // Refresh halaman atau perbarui tampilan jika diperlukan
                location.reload();
                },
            error: function (xhr, status, error) {
                // Handle error, misalnya, tampilkan pesan kesalahan
                console.error(error);
                alert('Terjadi kesalahan saat menghapus gambar');
                    }
                });
            }
        }
    </script>
    <script>
    function deleteFile(itemId) {
        if (confirm('Anda yakin ingin menghapus file ini?')) {
            // Kirim permintaan AJAX ke server untuk menghapus file
            $.ajax({
                type: 'POST',
                url: '/delete-file',
                data: {
                    itemId: itemId,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    // Handle response, misalnya, tampilkan pesan bahwa file berhasil dihapus
                    alert('File berhasil dihapus');
                    // Refresh halaman atau perbarui tampilan jika diperlukan
                    location.reload();
                },
                error: function (xhr, status, error) {
                    // Handle error, misalnya, tampilkan pesan kesalahan
                    console.error(error);
                    alert('Terjadi kesalahan saat menghapus file');
                }
            });
        }
    }
</script>

@endsection

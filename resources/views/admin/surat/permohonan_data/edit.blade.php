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
                            <form action="{{ route('update.suratPermohonanData', $suratPermohonanData->id ) }}" method="POST">
                                @csrf
                                <div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">Nomor Surat</label>
                                    <input type="text" value="{{$suratPermohonanData->nomor}}" class="form-control form-control-solid" name="nomor"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">Ditujukan Kepada</label>
                                    <input type="text" value="{{$suratPermohonanData->yth}}" class="form-control form-control-solid" required name="yth"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">Kepada Ditempat</label>
                                    <input type="text" value="{{$suratPermohonanData->tempat}}" class="form-control form-control-solid" required name="tempat"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">Nim</label>
                                    <input type="text" value="{{$suratPermohonanData->nim}}" class="form-control form-control-solid" required name="nim"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">Data 1</label>
                                    <input type="text" value="{{$suratPermohonanData->data1}}" class="form-control form-control-solid" required name="data1"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">Data 2</label>
                                    <input type="text" value="{{$suratPermohonanData->data2}}" class="form-control form-control-solid" name="data2"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">Data 3</label>
                                    <input type="text" value="{{$suratPermohonanData->data3}}" class="form-control form-control-solid"  name="data3"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">Data 4</label>
                                    <input type="text" value="{{$suratPermohonanData->data4}}" class="form-control form-control-solid"  name="data4"/>
                                </div>
								<div class="mb-10">
                                    <label for="exampleFormControlInput1" class=" form-label">Data 5</label>
                                    <input type="text" value="{{$suratPermohonanData->data5}}" class="form-control form-control-solid"  name="data5"/>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <!--begin::Actions-->
                                    <a href="{{ route('suratPermohonanData') }}" class="btn btn-secondary">
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
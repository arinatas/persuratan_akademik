<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack justify-content-center">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}
            </h1>
            <!--end::Title-->
            <!--begin::Separator-->
            <span class="h-20px border-gray-200 border-start mx-4"></span>
            <!--end::Separator-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="#" class="text-muted text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">{{ $active }}</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
    </div>
    <!--end::Container-->
</div>

@if (\Session::has('insertSuccess'))
<script>
    Swal.fire(
    'Berhasil!',
    '{!! \Session::get('insertSuccess') !!}',
    'success'
    )
</script>
@endif
@if (\Session::has('insertFail'))
<script>
    Swal.fire(
    'Gagal!',
    '{!! \Session::get('insertFail') !!}',
    'error'
    )
</script>
@endif
@if (\Session::has('updateSuccess'))
<script>
    Swal.fire(
    'Berhasil!',
    '{!! \Session::get('updateSuccess') !!}',
    'success'
    )
</script>
@endif
@if (\Session::has('deleteSuccess'))
<script>
    Swal.fire(
    'Berhasil!',
    '{!! \Session::get('deleteSuccess') !!}',
    'success'
    )
</script>
@endif
@if (\Session::has('dataNotFound'))
<script>
    Swal.fire(
    'Ups!',
    '{!! \Session::get('dataNotFound') !!}',
    'warning'
    )
</script>
@endif
@if (\Session::has('deleteFail'))
<script>
    Swal.fire(
    'Failed',
    '{!! \Session::get('deleteFail') !!}',
    'error'
    )
</script>
@endif
@if (\Session::has('updateFail'))
<script>
    Swal.fire(
    'Gagal!',
    '{!! \Session::get('updateFail') !!}',
    'error'
    )
</script>
@endif
<!-- Display error message with SweetAlert -->
@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: '{{ session('error') }}',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK',
    });
</script>
@endif
@if(session('forbidden'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Actions Prohibited!',
        text: '{{ session('forbidden') }}',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK',
    });
</script>
@endif
@if (\Session::has('validatorFail'))
<script>
    Swal.fire(
    'Gagal!',
    '{!! \Session::get('validatorFail') !!}',
    'error'
    )
</script>
@endif

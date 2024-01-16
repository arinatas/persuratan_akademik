<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Surat Permohonan Permintaan Data</title>
		<link rel="shortcut icon" href="/assets/media/logos/smallprimakara.png" />

        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap 4 -->

        <!-- Font Awesome -->
        <!-- Ionicons -->
        <!-- adminlte css-->
        <link rel="stylesheet" href="/css/adminlte.min.css">

        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <style>
        @font-face {
        font-family: 'XDPrime'; /* Gantilah dengan nama yang Anda inginkan */
        src: url('./XDPrime-Regular.otf') format('opentype');
        /* Gantilah dengan path yang benar ke file .otf Anda */
        }

        body {
            font-family: 'XDPrime'; /* Menggunakan font custom pada elemen body */
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            text-align: center;
        }
    </style>

    <body>
    @foreach ($suratPermohonanData as $item)
        <div class="wrapper">
            <!-- Main content -->
            <div class="container mt-5">
                <section class="letter">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12 ml-4">
                            <img alt="Logo" class="" src="/assets/media/logos/primakara_landscape.png" width="300px" />
                        </div>
                        <div class="col-12 text-center">
                            <h2 class="mt-5"><b>SURAT PERMOHONAN</b></h2>
                            <h4 class=""><b>Nomor : {{ $item->nomor }}</b></h2>
                        </div>
                        <!-- /.col -->
                    </div>

                    <div class="mx-5 px-5" style="font-size: 20px">
                        <!-- info row -->
                            <div class="row letter-yth">
                                <div class="col-sm-12 letter-col mt-3">
                                    <address>
                                        <div class="row">
                                            <div class="col-10">
                                                <table style="font-weight: bolder; font-style: italic;">
                                                    <tr>
                                                        <td>Kepada Yth.</td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ $item->yth }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; di – {{ $item->tempat }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </address>
                                </div>
                                <!-- /.col -->
                            </div>
                        <!-- /.row -->

                        <!-- info row -->
                            <div class="row letter-info-mhs">
                                <div class="col-sm-12 letter-col">
                                    <address>
                                        <div class="row">
                                            <div class="col-12">
                                                <table>
                                                    <tr>
                                                        <td>Dengan hormat,</td>
                                                    </tr>
                                                </table>
                                                <p style="text-align: justify; text-indent: 30px;">
                                                    Sehubungan dengan penyusunan tugas proposal skripsi/ tugas akhir yang saat ini sedang dijalani oleh mahasiswa Primakara University, maka dengan ini kami mohon kepada Bapak/Ibu Pimpinan untuk dapat memberikan data dan observasi untuk pengerjaan proposal skripsi/ tugas akhir mahasiswa kami,  atas nama:
                                                </p>
                                            </div>
                                        </div>
                                    </address>
                                </div>
                                <!-- /.col -->
                            </div>
                        <!-- /.row -->

                        <div class="mx-5" style="margin-top: -20px">                        
                            <!-- info row -->
                            <div class="row letter-info-mhs">
                                <div class="col-sm-12 letter-col">
                                    <address>
                                        <div class="row">
                                            <div class="col-12">
                                                <table class="">
                                                    <tr>
                                                        <td>Nama</td>
                                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp; {{ $item->biodata->nama }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nim</td>
                                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp; {{ $item->nim }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Prodi</td>
                                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp; {{ $item->biodata->prodi }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </address>
                                </div>
                                <!-- /.col -->
                            </div>
                        </div>
                        <!-- /.row -->

                         <!-- info row -->
                            <div class="row letter-info-izin">
                                <div class="col-sm-12 letter-col">
                                    <address>
                                        <div class="row">
                                            <div class="col-12">
                                                <p style="text-align: justify;">
                                                    Adapun data yang diperlukan adalah sebagai berikut :
                                                </p>
                                                <div class="mx-5">           
                                                    <div class="row letter-info-mhs">
                                                        <div class="col-sm-12 letter-col">
                                                            <address>
                                                            <div class="row">
                                                                <div class="col-12 table-responsive">
                                                                    <table class="table table-sm table-bordered">
                                                                            <tbody>
                                                                                @php
                                                                                    $no = 1; // Initialize the counter
                                                                                @endphp
                                                                                @if($item->data1)
                                                                                    <tr>
                                                                                        <td>{{ $no++ }}</td>
                                                                                        <td>{{ $item->data1 }}</td>
                                                                                    </tr>
                                                                                @endif
                                                                                @if($item->data2)
                                                                                    <tr>
                                                                                        <td>{{ $no++ }}</td>
                                                                                        <td>{{ $item->data2 }}</td>
                                                                                    </tr>
                                                                                @endif
                                                                                @if($item->data3)
                                                                                    <tr>
                                                                                        <td>{{ $no++ }}</td>
                                                                                        <td>{{ $item->data3 }}</td>
                                                                                    </tr>
                                                                                @endif
                                                                                @if($item->data4)
                                                                                    <tr>
                                                                                        <td>{{ $no++ }}</td>
                                                                                        <td>{{ $item->data4 }}</td>
                                                                                    </tr>
                                                                                @endif
                                                                                @if($item->data5)
                                                                                    <tr>
                                                                                        <td>{{ $no++ }}</td>
                                                                                        <td>{{ $item->data5 }}</td>
                                                                                    </tr>
                                                                                @endif
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </address>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.row -->
                                                <p style="text-align: justify; text-indent: 30px;">
                                                    Demikian Surat Keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya. 
                                                </p>
                                            </div>
                                        </div>
                                    </address>
                                </div>
                                <!-- /.col -->
                            </div>
                        <!-- info row -->
                        <div style="float: inline-end; margin-top: -30px">
                            <div>
                                <address>
                                    <span>Denpasar, {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</span><br>
                                    <span>Primakara University</span><br>
                                    <span>Wakil Rektor I Bidang Akademik</span><br>
                                    @if ($penandaTangan->file_ttd)
                                        <img src="{{ asset('storage/images/' . basename($penandaTangan->file_ttd)) }}" alt="File TTD" class="img-fluid mx-auto d-block mt-10" width="160px">
                                    @else
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                    @endif
                                    <strong><u>{{ $penandaTangan->nama }}</u></strong><br>
                                    <strong>NIDN. {{ $penandaTangan->nidn }}</strong><br>
                                </address>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
        
                       
                    </div>

                    <div class="footer">
                        <!-- info row -->
                        <div class="row mb-3" style="place-content: center;">
                                <img alt="Logo" class="" src="/assets/media/print/iso.png" width="240px" />
                                <p class="mx-5 px-5"></p>
                                <table style="font-size: 16px; text-align: end; color:#1d2b58;">
                                    <tr>
                                        <td><b>PRIMAKARA UNIVERSITY</b></td>
                                    </tr>
                                    <tr>
                                        <td>Jalan Tukad Badung No. 135 Renon, Denpasar, Bali – 80226</td>
                                    </tr>
                                    <tr>
                                        <td>e: info@primakara.ac.id / t: +62 361 895 6084 / +62 361 895 6085</td>
                                    </tr>
                                    <tr>
                                        <td><b>www.primakara.ac.id</b></td>
                                    </tr>
                                </table>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <img alt="Logo" class="" src="/assets/media/print/footer.png" width="100%" />
                    </div>
                </section>
            </div>
        </div>
        <!-- ./wrapper -->

        @endforeach
        <script>
            window.addEventListener("load", window.print());
        </script>
    </body>
</html>

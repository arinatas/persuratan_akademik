<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Surat Izin Absensi</title>
		<link rel="shortcut icon" href="assets/media/logos/smallprimakara.png" />

        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap 4 -->

        <!-- Font Awesome -->
        <!-- Ionicons -->
        <!-- adminlte css-->
        <link rel="stylesheet" href="css/adminlte.min.css">

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
        <div class="wrapper">
            <!-- Main content -->
            <div class="container mt-5">
                <section class="letter">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12 ml-4">
                            <img alt="Logo" class="" src="assets/media/logos/primakara_landscape.png" width="300px" />
                        </div>
                        <div class="col-12 text-center">
                            <h2 class="my-5"><b><u>SURAT PERMOHONAN IZIN</u></b></h2>
                        </div>
                        <!-- /.col -->
                    </div>

                    <div class="mx-5" style="font-size: 20px">

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
                                                    <td>Kepala Direktorat  Administrasi dan Layanan Akademik</td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; di – tempat</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-2" style="text-align: end;">
                                            <img alt="Logo" class="" src="assets/media/print/parafacc.png" width="120px" />
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
                                                <tr>
                                                    <td>Saya yang bertanda tangan di bawah ini :  </td>
                                                </tr>
                                            </table>
                                            <table class="mt-2">
                                                <tr>
                                                    <td>Nim</td>
                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp; {{ $data['nim'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp; {{ $data['nama'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Prodi</td>
                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp; {{ $data['prodi'] }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 mt-3" style="text-indent: 30px;">
                                            Mengajukan permohonan izin untuk tidak mengukuti proses belajar mengajar pada mata kuliah berikut :
                                        </div>
                                    </div>
                                </address>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
        
                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr class="fw-semibold fs-6 text-bold">
                                            <th>No</th>
                                            <th>Nama Mata Kuliah</th>
                                            <th>Dosen</th>
                                            <th>Hari / Tanggal</th>
                                            <th>Jam</th>
                                            <th>Jml Izin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($data['matakuliah1'])
                                            <tr>
                                                <td>1</td>
                                                <td>{{ $data['matakuliah1'] }}</td>
                                                <td>{{ $data['dosen1'] }}</td>
                                                <td>{{ \Carbon\Carbon::parse($data['tanggal1'])->isoFormat('dddd, D MMM Y') }}</td>
                                                <td>{{ $data['jam1'] }}</td>
                                                <td>{{ $data['jml_izin1'] }}</td>
                                            </tr>
                                        @endif
                                        @if ($data['matakuliah2'])
                                            <tr>
                                                <td>2</td>
                                                <td>{{ $data['matakuliah2'] }}</td>
                                                <td>{{ $data['dosen2'] }}</td>
                                                <td>{{ \Carbon\Carbon::parse($data['tanggal2'])->isoFormat('dddd, D MMM Y') }}</td>
                                                <td>{{ $data['jam2'] }}</td>
                                                <td>{{ $data['jml_izin2'] }}</td>
                                            </tr>
                                        @endif
                                        @if ($data['matakuliah3'])
                                            <tr>
                                                <td>3</td>
                                                <td>{{ $data['matakuliah3'] }}</td>
                                                <td>{{ $data['dosen3'] }}</td>
                                                <td>{{ \Carbon\Carbon::parse($data['tanggal3'])->isoFormat('dddd, D MMM Y') }}</td>
                                                <td>{{ $data['jam3'] }}</td>
                                                <td>{{ $data['jml_izin3'] }}</td>
                                            </tr>
                                        @endif
                                        @if ($data['matakuliah4'])
                                            <tr>
                                                <td>4</td>
                                                <td>{{ $data['matakuliah4'] }}</td>
                                                <td>{{ $data['dosen4'] }}</td>
                                                <td>{{ \Carbon\Carbon::parse($data['tanggal4'])->isoFormat('dddd, D MMM Y') }}</td>
                                                <td>{{ $data['jam4'] }}</td>
                                                <td>{{ $data['jml_izin4'] }}</td>
                                            </tr>
                                        @endif
                                        @if ($data['matakuliah5'])
                                            <tr>
                                                <td>5</td>
                                                <td>{{ $data['matakuliah5'] }}</td>
                                                <td>{{ $data['dosen5'] }}</td>
                                                <td>{{ \Carbon\Carbon::parse($data['tanggal5'])->isoFormat('dddd, D MMM Y') }}</td>
                                                <td>{{ $data['jam5'] }}</td>
                                                <td>{{ $data['jml_izin5'] }}</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- info row -->
                        <div class="row letter-info-izin">
                            <div class="col-sm-12 letter-col mt-2">
                                <address>
                                    <div class="row">
                                        <div class="col-12 mt-2">
                                            <p style="text-align: justify; text-indent: 30px;">Adapun alasan  pemohonan izin ini adalah : <u>{{ $data['alasan'] }}</u> </p>
                                        </div>
                                        <div class="col-12 mt-2">
                                            <p style="text-align: justify;">Demikian permohonan ini saya sampaikan, atas izin yang diberikan saya ucapkan terima kasih.</p>
                                        </div>
                                    </div>
                                </address>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
        
                        <!-- info row -->
                        <div class="row">
                            <div class="col-8 letter-col mt-3">
                                <address>
                                    <strong>Mengetahui,</strong><br>
                                    <strong>Orang Tua / Wali</strong>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <strong><u>{{ $data['ortu'] }}</u></strong><br>
                                </address>
                            </div>
                            <div class="col-4 letter-col mt-3">
                                <address>
                                    <strong>Denpasar, {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</strong><br>
                                    <strong>Hormat saya,</strong>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <strong><u>{{ $data['nama'] }}</u></strong><br>
                                </address>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                       
                    </div>

                    <div class="footer">
                        <!-- info row -->
                        <div class="row mb-3" style="place-content: center;">
                                <img alt="Logo" class="" src="assets/media/print/iso.png" width="240px" />
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
                        <img alt="Logo" class="" src="assets/media/print/footer.png" width="100%" />
                    </div>
                </section>
            </div>
        </div>
        <!-- ./wrapper -->

        <script>
            window.addEventListener("load", window.print());
        </script>
    </body>
</html>

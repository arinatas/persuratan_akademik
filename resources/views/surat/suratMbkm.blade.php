<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Surat Magang MBKM</title>
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
            background-color: #1d2b58;
            text-align: center;
        }
    </style>

    <body>
    @foreach ($suratMbkm as $item)
        <div class="wrapper">
            <!-- Main content -->
            <div class="container mt-5 pt-5">
                <section class="letter">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12 ml-5">
                            <img alt="Logo" class="my-5" src="/assets/media/logos/primakara_landscape.png" width="250px" />
                        </div>

                        <div class="mx-5 px-5">
                        <div class="row letter-info-mhs">
                                <div class="col-sm-12 letter-col">
                                    <address>
                                        <div class="row">
                                            <div class="col-12">
                                                <table>
                                                    <tr>
                                                        <td>Nomor</td>
                                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                        <td>: &nbsp;&nbsp;&nbsp;{{ $item->nomor }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lampiran</td>
                                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                        <td>: &nbsp;&nbsp;&nbsp;-</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Perihal</td>
                                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                        <td>: &nbsp;&nbsp;&nbsp;Permohonan Izin Magang Merdeka Belajar Kampus Merdeka</td>
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
                                            <div class="col-2" style="text-align: end;">
                                                <img alt="Logo" class="" src="assets/media/print/parafacc.png" width="100px" />
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
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sehubungan dengan pelaksanaan program Magang Merdeka Belajar Kampus Merdeka yang saat ini diikuti oleh mahasiswa kami, maka kami mohon kepada Bapak/Ibu untuk memberikan izin mahasiswa kami untuk mengadakan kegiatan magang di instansi yang Bapak/Ibu Pimpin, mulai dari tanggal {{ \Carbon\Carbon::parse($item->tgl_mulai)->format('d F Y') }}
                                                sampai dengan tanggal {{ \Carbon\Carbon::parse($item->tgl_selesai)->format('d F Y') }}. Adapun mahasiswa kami adalah sebagai berikut :
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
                                                <th>Nim</th>
                                                <th>Nama</th>
                                                <th>Program Studi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>{{ $item->nim }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->prodi }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- info row -->
                            <div class="row letter-info-izin">
                                <div class="col-sm-12 letter-col">
                                    <address>
                                        <div class="row">
                                            <div class="col-12 mt-3">
                                                <p style="text-align: justify; text-indent: 30px;">Demikian permohonan kami, atas bantuan dan kerja samanya kami ucapkan terima kasih.</u> </p>
                                            </div>
                                        </div>
                                    </address>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
            
                            <!-- info row -->
                            <div class="row">
                                <div class="col-8 letter-col mt-5">
                                    <address>
                                        <strong>Mengetahui,</strong><br>
                                        <strong>Orang Tua / Wali</strong>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <strong><u>I Made Artana, S.Kom.,M.M.</u></strong><br>
                                    </address>
                                </div>
                                <div class="col-4 letter-col mt-5">
                                    <address>
                                        <strong>Denpasar,</strong><br>
                                        <strong>Hormat saya,</strong>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <strong><u>I Made Artana, S.Kom.,M.M.</u></strong><br>
                                    </address>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        
                            <!-- info row -->
                            <div class="row mt-5">
                                <div class="col-6 letter-col mt-4">
                                    <img alt="Logo" class="" src="assets/media/print/iso.png" width="250px" />
                                </div>
                                <div class="col-6 letter-col mt-5 pt-2">
                                    <table style="font-size: 13px; text-align: end; color:#1d2b58;">
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
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>

                        <div class="footer">
                            <img alt="Logo" class="" src="assets/media/print/footer.png" width="100%" />
                        </div>
                    </section>
                </div>
            </div>
            <!-- ./wrapper -->
        @endforeach
    </body>
</html>

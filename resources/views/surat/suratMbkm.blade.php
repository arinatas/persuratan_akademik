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
            text-align: center;
        }
    </style>

    <body>
    @foreach ($suratMbkm as $item)
        <div class="wrapper">
            <!-- Main content -->
            <div class="container mt-5">
                <section class="letter">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12 ml-5">
                            <img alt="Logo" class="my-5" src="/assets/media/logos/primakara_landscape.png" width="300px" />
                        </div>

                        <div class="mx-5 px-5" style="font-size: 20px">
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
                                                    Sehubungan dengan pelaksanaan program Magang Merdeka Belajar Kampus Merdeka yang saat ini diikuti oleh mahasiswa kami, maka kami mohon kepada Bapak/Ibu untuk memberikan izin mahasiswa kami untuk mengadakan kegiatan magang di instansi yang Bapak/Ibu Pimpin, mulai dari tanggal {{ \Carbon\Carbon::parse($item->tgl_mulai)->format('d F Y') }} sampai dengan tanggal {{ \Carbon\Carbon::parse($item->tgl_selesai)->format('d F Y') }}. Adapun mahasiswa kami adalah sebagai berikut :
                                                </p>
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
                                                <th class="text-center">No</th>
                                                <th class="text-center">Nim</th>
                                                <th class="text-center">Nama</th>
                                                <th class="text-center">Program Studi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1; // Initialize the counter
                                            @endphp
                                            @if($item->nim1)
                                                <tr>
                                                    <td class="text-center">{{ $no++ }}</td>
                                                    <td class="text-center">{{ $item->nim1 }}</td>
                                                    <td class="text-center">{{ $item->nama1 }}</td>
                                                    <td class="text-center">{{ $item->prodi1 }}</td>
                                                </tr>
                                            @endif
                                            @if($item->nim2)
                                                <tr>
                                                    <td class="text-center">{{ $no++ }}</td>
                                                    <td class="text-center">{{ $item->nim2 }}</td>
                                                    <td class="text-center">{{ $item->nama2 }}</td>
                                                    <td class="text-center">{{ $item->prodi2 }}</td>
                                                </tr>
                                            @endif
                                            @if($item->nim3)
                                                <tr>
                                                    <td class="text-center">{{ $no++ }}</td>
                                                    <td class="text-center">{{ $item->nim3 }}</td>
                                                    <td class="text-center">{{ $item->nama3 }}</td>
                                                    <td class="text-center">{{ $item->prodi3 }}</td>
                                                </tr>
                                            @endif
                                            @if($item->nim4)
                                                <tr>
                                                    <td class="text-center">{{ $no++ }}</td>
                                                    <td class="text-center">{{ $item->nim4 }}</td>
                                                    <td class="text-center">{{ $item->nama4 }}</td>
                                                    <td class="text-center">{{ $item->prodi4 }}</td>
                                                </tr>
                                            @endif
                                            @if($item->nim5)
                                                <tr>
                                                    <td class="text-center">{{ $no++ }}</td>
                                                    <td class="text-center">{{ $item->nim5 }}</td>
                                                    <td class="text-center">{{ $item->nama5 }}</td>
                                                    <td class="text-center">{{ $item->prodi5 }}</td>
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
                                <div class="col-sm-12 letter-col">
                                    <address>
                                        <div class="row">
                                            <div class="col-12 mt-3">
                                                <p style="text-align: justify; text-indent: 30px;">
                                                    Demikian permohonan kami, atas bantuan dan kerja samanya kami ucapkan terima kasih.
                                                </p>
                                            </div>
                                        </div>
                                    </address>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
            
                            <!-- info row -->
                            <div style="float: inline-end;">
                                <div>
                                    <address>
                                        <span>Denpasar, {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</span><br>
                                        <span>Primakara University</span><br>
                                        <span>Wakil Rektor I Bidang Akademik</span><br>
                                        @if ($penandaTangan->file_ttd)
                                            <img src="{{ asset('storage/' . $penandaTangan->file_ttd) }}" alt="File TTD" class="img-fluid mx-auto d-block mt-10" width="160px">
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
                        
                            <!-- info row -->
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

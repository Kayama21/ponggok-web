@extends('index')

@section('content')
<style>
    .surat-wrapper {
        margin: 0 auto;
        max-width: 1240px;
        max-height: 1754px;
        width: 100%;
        background: white;
        padding: 40px;
        color: black;
    }

    #tls {
        text-align: right;
    }

    .alamat-tujuan {
        margin-left: 50%;
    }

    .garis1 {
        border-top: 3px solid black;
        height: 2px;
        border-bottom: 1px solid black;
    }

    #logo {
        margin: auto;
    }

    #tempat-tgl {
        margin-left: 120px;
    }

    #camat {
        text-align: center;
    }

    #nama-camat {
        margin-top: 100px;
        text-align: center;
    }
</style>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Signing</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Signing</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- /.content-header -->
<section class="content">
    <div class="card card-solid">
        <div class="card-body">
            <div class="surat-wrapper">
                <header>
                    <div class="row">
                        <div id="img" class="col-md-3">
                            <img id="logo" src="{{asset('assets/img/PonggokLogo.png')}}" width="200px" />
                        </div>
                        <div class="col-md-6" style="text-align: center;">
                            <p style="font-size: 40px;"><strong>PEMERINTAH KOTA BLITAR<strong></p>
                            <p style="font-size: 30px;"><strong>KECAMATAN PONGGOK</strong></p>
                            <p>Jl. Soekarno-Hatta, No. 68, Telepon/Faximile (0298) 523024</p>
                            <p style="font-size: 30px;"><strong>PONGGOK 50552</strong></p>
                        </div>
                    </div>
                </header>

                <div class="container">
                    <hr class="garis1" />
                    <div class="row">
                        <div id="lampiran" class="col-md-6">
                            Nomor : - <br />
                            Lampiran : - <br />
                            Perihal : {{ $signature->kategoriSurat }}
                        </div>
                        <div id="tgl-srt" class="col-md-6">
                            <p id="tls">Ponggok, {{ date('D M Y') }}</p>

                            <p class="alamat-tujuan">Kepada Yth. :<br />
                                {{ $signature->namaPengaju }}
                            </p>
                        </div>
                    </div>
                    <div id="pembuka" class="row">&emsp; &emsp; &emsp; Menindak lanjuti surat dari Sekretariat Daerah Kabupaten Semarang Nomor : 005/001819/2018 perihal Peraturan Baru mengenai Badan Permusyawaratan Desa (BPD) berdasarkan Perda Nomor 4 Tahun 2018 dan Perbup Nomor 21 Tahun 2018 serta Tahapan Pengisian Anggota BPD, bersama ini kami mengharap atas kehadiran saudara besok pada :</div>
                    <div id="tempat-tgl">
                        <table>
                            <tr>
                                <td>Hari</td>
                                <td>:</td>
                                <td>Kamis</td>
                            </tr>
                            <tr>
                                <td>Tanggal</td>
                                <td>:</td>
                                <td>28 Juni 2018</td>
                            </tr>
                            <tr>
                                <td>Jam</td>
                                <td>:</td>
                                <td>08.00 WIB</td>
                            </tr>
                            <tr>
                                <td>Tempat</td>
                                <td>:</td>
                                <td>Aula PP PAUD dan Dikmas Jawa Tengah Jl. Diponegoro No 250 Ungaran</td>
                            </tr>
                            <tr>
                                <td>Catatan</td>
                                <td>:</td>
                                <td>-</td>
                            </tr>
                        </table>
                    </div>
                    <div id="penutup">Demikian untuk menjadikan perhatian dan atas kehadirannya diucapkan terimakasih.</div>
                    <div id="ttd" class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <p id="camat"><strong>LURAH PONGGOK</strong></p>
                            <div id="nama-camat"><strong><u>{{ auth()->user()->name }}</u></strong><br />
                                Lurah Desa Ponggok<br />
                                NIP.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form method="POST" action="/ajuan/signed-ajuan" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id_ajuan" class="form-control" value="{{ $signature->id }}" readonly>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Setujui Tanda Tangan</button>
            </div>
        </form>
    </div>
</section>
@endsection
@section('script')

@endsection('script')
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
                    <div style="text-align: center; margin: auto;">
                        <p style="font-size: 40px;"><strong>PEMERINTAH KOTA BLITAR<strong></p>
                        <p style="font-size: 30px;">KECAMATAN PONGGOK</p>
                        <p>Jl. Soekarno-Hatta, No. 68, Telepon/Faximile (0298) 523024</p>
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
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>{{ auth()->user()->name }}</td>
                                </tr>
                                <tr>
                                    <td>NIP</td>
                                    <td>:</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Jabatan</td>
                                    <td>:</td>
                                    <td>Lurah I</td>
                                </tr>
                                <tr>
                                    <td>Instansi</td>
                                    <td>:</td>
                                    <td>Kecamatan Ponggok</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>Dengan keputusan surat ini, menyetujui pengajuan dokumen {{ $signature->kategoriSurat }} oleh :</div>
                    <div id="tempat-tgl">
                        <table>
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>{{ $signature->namaPengaju }}</td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td>:</td>
                                    <td>{{ $signature->nik }}</td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan</td>
                                    <td>:</td>
                                    <td>-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="penutup">Dengan ini surat ini dibuat untuk digunakan sebagaimana mestinya.</div>
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
                <button type="submit" class="btn btn-primary" style="margin-right: 10px;">Setujui Tanda Tangan</button>
                <a href="/show-pdf/{{ $signature->id }}" class="btn btn-secondary">Lihat Bentuk PDF</a>
            </div>
        </form>
    </div>
</section>
@endsection
@section('script')

@endsection('script')
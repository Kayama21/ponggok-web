<!DOCTYPE html>
<html>
<style>
    .surat-wrapper {
        margin: 0 auto;
        max-width: 1240px;
        max-height: 1754px;
        width: 100%;
        background: white;
        color: black;
    }

    .garis1 {
        border-top: 3px solid black;
        height: 2px;
        border-bottom: 1px solid black;
    }

    .ttd {
        position: absolute;
        right: 0px;
        width: 300px;
        text-align: center;
    }

    #lampiran {
        float: left;
    }

    #tanggal-surat {
        float: right;
    }

    #tanggal-surat .kepada {
        text-align: left;
    }

    .clearfix:after {
        content: "";
        display: table;
        clear: both;
    }

    #details {
        margin-bottom: 50px;
    }

    #data-lurah-pengaju {
        margin: 10px 0 10 30px;
    }

    .header-wrapper {
        display: table;
        margin: auto;
    }

    #alamat {
        display: table-cell;
        vertical-align: middle;
        text-align: center;
    }

    footer {
        position: fixed;
        bottom: -60px;
        left: 0px;
        right: 0px;
        height: 50px;
    }
</style>

<head>
    <title>PonggokWeb | Document Making | PDF</title>
</head>

<body>
    <div class="surat-wrapper">
        <header class="header-wrapper">
            <img src="">
            <div id="alamat">
                <h2>PEMERINTAH KOTA BLITAR</h2>
                <div>KECAMATAN PONGGOK</div>
                <div>Jl. Soekarno-Hatta, No. 68, Telepon/Faximile (0298) 523024</div>
                <!-- <div><a href="mailto:company@example.com">company@example.com</a></div> -->
            </div>
        </header>

        <hr class="garis1" />

        <div id="details" class="clearfix">
            <div id="lampiran">
                <div>Nomor : -</div>
                <div>Lampiran : -</div>
                <div class="address">Perihal : {{ $kategoriSurat }}</div>
            </div>
            <div id="tanggal-surat">
                <div>Ponggok, {{ date('D M Y') }}</div>
                <div class="kepada">Kepada Yth. :</div>
                <div class="kepada">{{ $namaPengaju }}</div>
            </div>
        </div>

        <div>
            Saya yang bertanda tangan dibawah ini :
        </div>

        <div id="data-lurah-pengaju">
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
        <div>Dengan keputusan surat ini, menyetujui pengajuan dokumen {{ $kategoriSurat }} oleh :</div>
        <div id="data-lurah-pengaju">
            <table>
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{ $namaPengaju }}</td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td>{{ $nik }}</td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>Dengan ini surat ini dibuat untuk digunakan sebagaimana mestinya.</div>

        <div class="ttd">
            <p><strong>LURAH PONGGOK</strong></p>
            <div style="margin-top: 100px;"><strong><u>{{ auth()->user()->name }}</u></strong><br />
                Lurah Desa Ponggok<br />
                NIP.</div>
        </div>
    </div>

    <footer>
        Copyright by Kantor Desa Ponggok, Kecamatan Ponggok, Kota Blitar &copy; <?php echo date("Y");?>
    </footer>
</body>

</html>
<!doctype html>
<html lang="en">

<head>
    <title>Berita Acara</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <main>
        <img src="https://csms.my.id/public/sb-admin/img/logo.png" style="margin-bottom: 2rem;">
        <p style="text-align: center;"><strong>BERITA ACARA PRAKUALIFIKASI CSMS</strong></p>
        <p style="text-align: justify;">{{ $tanggal }}, kami yang di bawah ini :</p>
        <ol style="list-style-type: upper-roman;">
            <li>&nbsp;{{ $beritaAcara->hse_name }}, selaku HSE dan Tim Prakualifikasi Contractor Safety Management
                System (CSMS) “Perusahaan Tambang Tuban”</li>
            <li>{{ $vendorDetail->direktur }}, selaku Direktur {{ $vendorDetail->nama_perusahaan }}, Prakualifikasi
                {{ $vendorDetail->nama_perusahaan }}</li>
        </ol>
        <p>Mempertimbangkan :</p>
        <ol style="list-style-type: lower-alpha;">
            <li>Isian Formulir CSMS tanggal {{ $tglPrakualifikasi }}</li>
            <li> lampiran Prakualifikasi CSMS</li>
            <li> dokumen dan lapangan&nbsp;</li>
        </ol>
        <p>Berdasarkan pertimbangan diatas, hasil penilaian prakualifikasi CSMS sebagai berikut:</p>
        <div class="table-responsive">
            <table style="width: 100%;   border: 1px solid; border-collapse: collapse;">
                <tr>
                    <td style="width: 33.3333%; text-align: center; border: 1px solid;">Nama Perusahaan</td>
                    <td style="width: 33.3333%; text-align: center; border: 1px solid;">Nilai</td>
                </tr>
                <tr>
                    <td
                        style="width: 33.3333%; border: 1px solid; text-align: center; vertical-align: middle; font-size: 14pt; font-weight: bold; padding-bottom: 2rem">
                        <br>{{ $vendorDetail->nama_perusahaan }}
                    </td>
                    <td
                        style="width: 33.3333%; border: 1px solid; text-align: center; vertical-align: middle; font-size: 14pt; font-weight: bold; padding-bottom: 2rem">
                        <br>{{ $beritaAcara->score }}
                    </td>
                </tr>
            </table>
        </div>
        <p>Demikian berita acara prakualifikasi ini dan dapat digunakan sebagaimana mestinya</p>
        <br><br><br>
        <div class="table-responsive">
            <table style="width: 100%;">
                <tbody>
                    <tr>
                        <td style="width: 50%;">Diterbitkan &nbsp;: Tuban<br>Tanggal&nbsp; &nbsp; &nbsp; &nbsp;
                            : {{ $tglttd }}</td>
                        <td style="width: 50%;"><br></td>
                    </tr>
                    <tr>
                        <td style="width: 50%; text-align: center;"> Manager Internal<br>Perusahaan Tambang</td>
                        <td style="width: 50%; text-align: center;">Pemohon<br>{{ $vendorDetail->nama_perusahaan }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%; text-align: center;">
                            <br><br><br><br><br>{{ $beritaAcara->manager_name }}<br>Manager
                        </td>
                        <td style="width: 50%; text-align: center;">
                            <br><br><br><br><br>{{ $vendorDetail->direktur }}<br>Direktur
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>

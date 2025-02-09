<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat</title>
    <style>
        @page {
            margin-top: 0cm;
        }

        body,
        html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            font-weight: bold;
        }

        .cover {
            background-image: url('http://csms-utsg.my.id/public/sb-admin/img/sertifikatbg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 95%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: black;
            /* Ubah warna teks sesuai kebutuhan */
        }

        .underline {
            text-decoration: underline;
        }

        .left-align {
            text-align: left;
            width: 100%;
            padding-left: 20px;
            box-sizing: border-box;
            position: absolute;
            bottom: 50px;
            left: 20px;
        }

        .logo img {
            width: 100px;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="cover">
        <h1 style="padding-top: 60px">SERTIFIKAT</h1>
        <h2 class="underline" style="margin: 0px">&nbsp; CONTRACTOR SAFETY MANAGEMENT SYSTEM &nbsp;</h2>
        <p style="margin-top: 0px">NO. {{ $nomorSertif }}</p>
        <p>Diberikan Kepada :</p><br>
        <h1>{{ $vendorDetail->nama_perusahaan }}</h1><br>
        <p>Berdasarkan Penilian dan verifikasi dokumen yang dilakukan PT Perusahaan Tambang&nbsp;
            <br>Menyatakan perusahaan tersebut diatas lulus <br> Prakualifikasi Contractor Safety Management System
            (CSMS) dengan Kriteria :
        </p>
        <h1>({{ $score }}%)</h1>
        <p>Berlaku selama 3 Tahun sejak diterbitkan</p>
        <p>Surabaya, {{ $tglCetak }}</p><br>
        <img src="{{ $qrcode_path }}" style="width: 7rem; margin: 5px;" alt="QR Code">
        <div class="left-align logo">
            <img src="http://csms-utsg.my.id/public/sb-admin/img/logo.png" alt="Logo Perusahaan">
        </div>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            font-weight: bold;
        }
        .cover {
            background-image: url('{{ URL::asset("sb-admin/img/sertifikatbg.jpg") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: black; /* Ubah warna teks sesuai kebutuhan */
        }
        .cover p {
            margin: 10px 0;
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
            bottom: 20px;
            left: 20px;
        }
        .logo img {
            width: 100px; /* Atur ukuran logo sesuai kebutuhan */
            height: auto;
        }
    </style>
</head>
<body>
    <div class="cover">
        <h1 style="margin-bottom: 0px">SERTIFIKAT</h1>
        <h2 class="underline" style="margin: 0px">&nbsp; CONTRACTOR SAFETY MANAGEMENT SYSTEM &nbsp;</h2>
        <p style="margin-top: 0px">NO.</p><br><br>
        <p>Diberikan Kepada :</p><br><br>
        <h1>PT. MENCARI CINTA SEJATI</h1><br><br>
        <p >Berdasarkan Penilian dan verifikasi dokumen yang dilakukan PT ........&nbsp; 
        <br>Menyatakan perusahaan tersebut diatas lulus <br> Prakualifikasi Contractor Safety Management System (CSMS) dengan Kriteria :</p><br>
        <h4>TINGGI (80%)</h4><br>
        <p>Berlaku selama 3 Tahun sejak diterbitkan</p>
        <p>Surabaya, 22 Januari 2024</p>
        <div class="left-align logo">
            <img src="{{ URL::asset('sb-admin/img/logo.png') }}" alt="Logo Perusahaan">
        </div>
    </div>
</body>
</html>

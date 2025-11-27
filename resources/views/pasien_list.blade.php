<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pasien - RS KIKO</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="header-container">
        <div class="search-box">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" placeholder="Search Data Pasien...">
        </div>
        <a href="pasien_tambah.php" class="btn-add">
            <i class="fa-solid fa-plus"></i>
            Tambah Data Pasien
        </a>
    </div>

    <table border="0">
        <thead>
            <tr>
                <th style="background:transparent; padding:0;">
                    <div class="header-pill">Nama Pasien</div>
                </th>
                <th style="background:transparent; padding:0;">
                    <div class="header-pill">Jenis Kelamin</div>
                </th>
                <th style="background:transparent; padding:0;">
                    <div class="header-pill">Tanggal Lahir</div>
                </th>
                <th style="background:transparent; padding:0;">
                    <div class="header-pill">Rekam Medis</div>
                </th>
                <th style="background:transparent; padding:0; width: 150px;"></th>
            </tr>
            <tr style="height: 10px;"></tr>
        </thead>
        
        <tbody>
            <tr class="data-row">
                <td>Oktariza Salsabila</td>
                <td>Perempuan</td>
                <td>25 Oktober 2006</td>
                <td>
                    <div class="medis-info">
                        <strong>Poli Gigi</strong>
                        <small>Radang Gusi</small>
                    </div>
                </td>
                <td style="background-color: transparent; border:none; padding: 0;">
                    <div class="action-buttons">
                        <a href="pasien_edit.php?id=1" class="btn-action">
                            <span class="btn-label">Edit</span>
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        <a href="#" onclick="return konfirmasiHapus(1);" class="btn-action">
                            <span class="btn-label">Hapus</span>
                            <i class="fa-solid fa-trash-can"></i>
                        </a>
                    </div>
                </td>
            </tr>

            <tr class="data-row">
                <td>Nida Auliya</td>
                <td>Perempuan</td>
                <td>21 Juli 2005</td>
                <td>
                    <div class="medis-info">
                        <strong>Poli Jantung</strong>
                        <small>Detak Jantung Lemah</small>
                    </div>
                </td>
                <td style="background-color: transparent; border:none; padding: 0;">
                    <div class="action-buttons">
                        <a href="pasien_edit.php?id=2" class="btn-action">
                            <span class="btn-label">Edit</span>
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        <a href="#" onclick="return konfirmasiHapus(2);" class="btn-action">
                            <span class="btn-label">Hapus</span>
                            <i class="fa-solid fa-trash-can"></i>
                        </a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <script src="script.js"></script>

</body>
</html>

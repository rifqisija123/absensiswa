<?php
require '../validasi.php';
require '../pages_admin/ceklogin.php';

if (!isset($_SESSION['log']) || $_SESSION['role'] != 'admin') {
    header('Location: ../login.php'); // Akses dibatasi untuk admin
    exit();
}
?>

<html>

<head>
    <title>Data Absen XI DKV 2</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
    <div class="container">
        <h2>Data Absen XI DKV 2</h2>
        <div class="card-body">
            <div class="table-responsive">
                <table
                    id="mauexport"
                    class="display table table-striped table-bordered table-hover" width="100%">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Tanggal Absen</th>
                            <th>Jam Masuk</th>
                            <th>Jam Pulang</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ambilsemuadataabsenxidkv2 = mysqli_query($conn, "SELECT * FROM dataabsenxidkv2");
                        while ($data = mysqli_fetch_array($ambilsemuadataabsenxidkv2)) {
                            $namalengkap = $data['namalengkap'];
                            $kelas = $data['kelas'];
                            $jurusan = $data['jurusan'];
                            $tanggalabsen = $data['tanggalabsen'];
                            $jammasuk = $data['jammasuk'];
                            $jamkeluar = $data['jamkeluar'];
                            $keterangan = $data['keterangan'];
                            $idabsendkv = $data['idabsendkv'];
                        ?>
                            <tr>
                                <td><?= $namalengkap; ?></td>
                                <td><?= $kelas; ?></td>
                                <td><?= $jurusan; ?></td>
                                <td><?= $tanggalabsen; ?></td>
                                <td><?= $jammasuk; ?></td>
                                <td><?= $jamkeluar; ?></td>
                                <td><?= $keterangan; ?></td>
                            </tr>
                        <?php
                        };
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#mauexport').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy','csv','excel', 'pdf', 'print'
            ]
        } );
    } );
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

</body>
</html>
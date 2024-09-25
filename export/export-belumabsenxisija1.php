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
    <title>Data Belum Absen XI SIJA</title>
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
        <h2>Data Belum Absen XI SIJA</h2>
        <div class="card-body">
            <div class="table-responsive">
                <table
                    id="mauexport"
                    class="display table table-striped table-bordered table-hover" width="100%">
                    <thead>
                        <tr>
                            <th>UID</th>
                            <th>Nama Lengkap</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $ambilsemuadataxisija1 = mysqli_query($conn, 
                            "SELECT * FROM dataxisija1 
                            WHERE uid NOT IN 
                            (SELECT uid FROM dataabsenxisija1 WHERE tanggalabsen = '$tanggalsekarang')");
                            while($data=mysqli_fetch_array($ambilsemuadataxisija1)){
                                $uid = $data['uid'];
                                $namalengkap = $data['namalengkap'];
                                $kelas = $data['kelas'];
                                $jurusan = $data['jurusan'];
                                $iddatasija = $data['iddatasija'];
                        ?>
                        <tr>
                            <td><?=$uid;?></td>
                            <td><?=$namalengkap;?></td>
                            <td><?=$kelas;?></td>
                            <td><?=$jurusan;?></td>
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
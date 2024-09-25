<?php
require '../validasi.php';
require './ceklogin.php';

if (!isset($_SESSION['log']) || $_SESSION['role'] != 'admin') {
  header('Location: ../login.php'); // Akses dibatasi untuk admin
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Data Murid SIJA</title>
  <meta
    content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    name="viewport" />
  <link
    rel="icon"
    href="../assets/img/kaiadmin/smkn9.png"
    type="image/x-icon" />

  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- CSS Files -->
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../assets/css/plugins.min.css" />
  <link rel="stylesheet" href="../assets/css/kaiadmin.min.css" />

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link rel="stylesheet" href="../assets/css/demo.css" />

  <!-- PLUGINS STYLES-->
  <link href="../assets/css/datatables.min.css" rel="stylesheet" />
  <!-- THEME STYLES-->
  <!-- <link href="../assets/css/main.min.css" rel="stylesheet" /> -->

  <!-- Fonts and icons -->
  <script src="../assets/js/plugin/webfont/webfont.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
  <script>
    WebFont.load({
      google: {
        families: ["Public Sans:300,400,500,600,700"]
      },
      custom: {
        families: [
          "Font Awesome 5 Solid",
          "Font Awesome 5 Regular",
          "Font Awesome 5 Brands",
          "simple-line-icons",
        ],
        urls: ["../assets/css/fonts.min.css"],
      },
      active: function() {
        sessionStorage.fonts = true;
      },
    });
  </script>
  <style>
    .swal2-popup {
      font-size: 1.2rem !important;
    }

    .custom-dropdown-item {
      background-color: blue;
      color: white;
    }

    .custom-dropdown-item:hover {
      background-color: #fff;
      color: black;
    }

    .role-title {
      font-size: 14px;
      color: darkgrey;
      margin-top: 5px;
      font-weight: bold;
    }

    a {
      text-decoration: none;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar" data-background-color="dark">
      <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
          <a href="../index.php" class="logo">
            <img
              src="../assets/img/kaiadmin/smkn9.png"
              alt="navbar brand"
              class="navbar-brand"
              height="50"
              width="50" /><span class="brand-text text-light"><strong>SiHajar</strong></span>
          </a>
          <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
              <i class="gg-menu-right"></i>
            </button>
            <button class="btn btn-toggle sidenav-toggler">
              <i class="gg-menu-left"></i>
            </button>
          </div>
          <button class="topbar-toggler more">
            <i class="gg-more-vertical-alt"></i>
          </button>
        </div>
        <!-- End Logo Header -->
      </div>
      <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
          <ul class="nav nav-secondary">
            <div class="container mt-4">
              <p class="role-title mb-0">Absensi Siswa</p>
              <p class="role-title mt-0">Role: Admin</p>
            </div>
            <li class="nav-item">
              <a
                href="../index.php">
                <i class="fas fa-home"></i>
                <p>Dashboard</p>
                <!-- <span class="caret"></span> -->
              </a>
              <!-- <div class="collapse" id="dashboard">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="../../demo1/index.html">
                        <span class="sub-item">Dashboard 1</span>
                      </a>
                    </li>
                  </ul>
                </div> -->
            </li>
            <li class="nav-section">
              <span class="sidebar-mini-icon">
                <i class="fa fa-ellipsis-h"></i>
              </span>
              <h4 class="text-section">DATABASE</h4>
            </li>
            <li class="nav-item">
              <a data-bs-toggle="collapse" href="#base">
                <i class="fas fa-table"></i>
                <p>SIJA</p>
                <span class="caret"></span>
              </a>
              <div class="collapse" id="base">
                <ul class="nav nav-collapse">
                  <li>
                    <a href="./data-sija.php">
                      <span class="sub-item">Data SIJA</span>
                    </a>
                  </li>
                  <li>
                    <a href="./data-absen-sija.php">
                      <span class="sub-item">Rekap Absen SIJA</span>
                    </a>
                  </li>
                  <li>
                    <a href="./log-sija.php">
                      <span class="sub-item">Log SIJA</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a data-bs-toggle="collapse" href="#sidebarLayouts">
                <i class="fas fa-table"></i>
                <p>DKV</p>
                <span class="caret"></span>
              </a>
              <div class="collapse" id="sidebarLayouts">
                <ul class="nav nav-collapse">
                  <li>
                    <a href="./data-dkv.php">
                      <span class="sub-item">Data DKV</span>
                    </a>
                  </li>
                  <li>
                    <a href="./data-absen-dkv.php">
                      <span class="sub-item">Rekap Absen DKV</span>
                    </a>
                  </li>
                  <li>
                    <a href="./log.dkv.php">
                      <span class="sub-item">Log DKV</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a data-bs-toggle="collapse" href="#forms">
                <i class="fas fa-table"></i>
                <p>LPB</p>
                <span class="caret"></span>
              </a>
              <div class="collapse" id="forms">
                <ul class="nav nav-collapse">
                  <li>
                    <a href="./data-lpb.php">
                      <span class="sub-item">Data LPB</span>
                    </a>
                  </li>
                  <li>
                    <a href="./data-absen-lpb.php">
                      <span class="sub-item">Rekap Absen LPB</span>
                    </a>
                  </li>
                  <li>
                    <a href="./log-lpb.php">
                      <span class="sub-item">Log LPB</span>
                    </a>
                  </li>
                </ul>
              </div>
              <a class="nav-link" href="./user-management.php">
                <i class="fa fa-users"></i>
                <p>User Management</p>
              </a>
              <a class="nav-link" href="../logout.php">
                <i class="fa-solid fa-right-from-bracket"></i>
                <p>Logout</p>
              </a>
            </li>
          </ul>
        </div>
        </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- End Sidebar -->

  <div class="main-panel">
    <div class="main-header">
      <div class="main-header-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
          <a href="../index.php" class="logo">
            <img
              src="../assets/img/kaiadmin/logo_light.svg"
              alt="navbar brand"
              class="navbar-brand"
              height="20" />
          </a>
          <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
              <i class="gg-menu-right"></i>
            </button>
            <button class="btn btn-toggle sidenav-toggler">
              <i class="gg-menu-left"></i>
            </button>
          </div>
          <button class="topbar-toggler more">
            <i class="gg-more-vertical-alt"></i>
          </button>
        </div>
        <!-- End Logo Header -->
      </div>
    </div>

    <div class="container">
      <div class="page-inner">
        <div class="page-header">
          <h3 class="fw-bold mb-3">Data Murid XI SIJA 1</h3>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <a href="add-xisija1.php" class="btn btn-primary"><i class="fa fa-plus">Tambah Data Siswa</i></a>
                <a href="../export/export-xisija1.php" class="btn btn-secondary ml-1">Export</a>
                <div class="dropdown">
                  <button class="btn btn-info float-end dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">X SIJA</button>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item custom-dropdown-item" href="dataxsija1.php">X SIJA 1</a></li>
                    <li><a class="dropdown-item custom-dropdown-item" href="dataxsija2.php">X SIJA 2</a></li>
                  </ul>
                  <button class="btn btn-info float-end dropdown-toggle me-3" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">XI SIJA</button>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton2">
                    <li><a class="dropdown-item custom-dropdown-item" href="dataxisija1.php">XI SIJA 1</a></li>
                  </ul>
                  <button class="btn btn-info float-end dropdown-toggle me-3" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">XII SIJA</button>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton3">
                    <li><a class="dropdown-item custom-dropdown-item" href="dataxiisija1.php">XII SIJA 1</a></li>
                    <li><a class="dropdown-item custom-dropdown-item" href="dataxiisija2.php">XII SIJA 2</a></li>
                  </ul>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    id="example-table"
                    class="display table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>UID</th>
                        <th>Nama Lengkap</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $ambilsemuadataxisija1 = mysqli_query($conn, "select * from dataxisija1");
                      while ($data = mysqli_fetch_array($ambilsemuadataxisija1)) {
                        $uid = $data['uid'];
                        $namalengkap = $data['namalengkap'];
                        $kelas = $data['kelas'];
                        $jurusan = $data['jurusan'];
                        $iddatasija = $data['iddatasija'];
                      ?>
                        <tr>
                          <td><?= $uid; ?></td>
                          <td><?= $namalengkap; ?></td>
                          <td><?= $kelas; ?></td>
                          <td><?= $jurusan; ?></td>
                          <td>
                            <a href="edit-xisija1.php?id=<?= $iddatasija; ?>" class="btn btn-primary"><i class="fa fa-edit">Edit</i></a>
                            <button type="button" data-id="<?= $iddatasija; ?>" class="btn btn-danger btn-hapus" data-toggle="modal" data-target="#delete<?= $iddatasija; ?>"><i class="fa fa-trash"></i>
                              Delete
                            </button>
                          </td>
                        </tr>
                      <?php
                      };
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- <footer class="footer">
          <div class="container-fluid d-flex justify-content-between">
            <nav class="pull-left">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="http://www.themekita.com">
                    ThemeKita
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Help </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Licenses </a>
                </li>
              </ul>
            </nav>
            <div class="copyright">
              2024, made with <i class="fa fa-heart heart text-danger"></i> by
              <a href="http://www.themekita.com">ThemeKita</a>
            </div>
            <div>
              Distributed by
              <a target="_blank" href="https://themewagon.com/">ThemeWagon</a>.
            </div>
          </div>
        </footer> -->
  </div>

  <!-- End Custom template -->
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery-3.7.1.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>

  <!-- jQuery Scrollbar -->
  <script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
  <!-- Datatables -->
  <script src="../assets/js/plugin/datatables/datatables.min.js"></script>
  <!-- Kaiadmin JS -->
  <script src="../assets/js/kaiadmin.min.js"></script>
  <!-- Kaiadmin DEMO methods, don't include it in your project! -->
  <script src="../assets/js/setting-demo2.js"></script>
  <script>
    $(document).ready(function() {
      $("#example-table").DataTable({});

      $("#multi-filter-select").DataTable({
        pageLength: 5,
        initComplete: function() {
          this.api()
            .columns()
            .every(function() {
              var column = this;
              var select = $(
                  '<select class="form-select"><option value=""></option></select>'
                )
                .appendTo($(column.footer()).empty())
                .on("change", function() {
                  var val = $.fn.dataTable.util.escapeRegex($(this).val());

                  column
                    .search(val ? "^" + val + "$" : "", true, false)
                    .draw();
                });

              column
                .data()
                .unique()
                .sort()
                .each(function(d, j) {
                  select.append(
                    '<option value="' + d + '">' + d + "</option>"
                  );
                });
            });
        },
      });

      // Add Row
      $("#add-row").DataTable({
        pageLength: 5,
      });

      var action =
        '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

      $("#addRowButton").click(function() {
        $("#add-row")
          .dataTable()
          .fnAddData([
            $("#addName").val(),
            $("#addPosition").val(),
            $("#addOffice").val(),
            action,
          ]);
        $("#addRowModal").modal("hide");
      });
    });
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Menambahkan event listener untuk semua tombol dengan kelas btn-hapus
      document.querySelectorAll('.btn-hapus').forEach(function(button) {
        button.addEventListener('click', function() {
          var itemId = this.getAttribute('data-id'); // Mendapatkan ID dari data-id

          Swal.fire({
            title: 'Apakah kamu yakin?',
            text: 'Data Akan di Hapus Selamanya!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545', // Warna btn-danger
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
              // Kirim permintaan Ajax untuk menghapus item
              $.ajax({
                url: '../hapus_data/fungsi_hapusxisija1.php', // Ganti dengan URL ke skrip PHP penghapus
                type: 'POST',
                data: {
                  id: itemId
                },
                error: function(response) {
                  // Tangani respons dari server jika diperlukan
                  Swal.fire(
                    'Berhasil Dihapus!',
                    'Data berhasil dihapus.',
                    'success'
                  ).then(() => {
                    // Refresh halaman atau hapus item dari tampilan
                    location.reload();
                  });
                },
                success: function() {
                  Swal.fire(
                    'Error!',
                    'There was a problem deleting the item.',
                    'error'
                  );
                }
              });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
              Swal.fire(
                'Batal',
                'Data anda aman',
                'error'
              );
            }
          });
        });
      });
    });
  </script>
</body>

</html>
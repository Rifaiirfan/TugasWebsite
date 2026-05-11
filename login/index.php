<?php
session_start();
if (empty($_SESSION['user']) && empty($_SESSION['pass'])) {
    echo "<script>window.location.replace('../index.php')</script>";
}
include '../assets/func.php';
$air = new klas_air;
$koneksi = $air->koneksi();
$dt_user = $air->dt_user($_SESSION['user']);
$level = $dt_user[2];
?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        var userLevel = "<?php echo $level; ?>";
    </script>
    <script>
        var userLogin = "<?php echo $_SESSION['user']; ?>";
    </script>
    <script src="../js/air.js"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fa-regular fa-chart-bar fa-beat fa-lg" style="color: rgb(14, 230, 163);"></i></div>
                            Dashboard
                        </a>
                        <?php
                        if ($level == "admin") {
                        ?>
                            <a class="nav-link" href="index.php?p=user">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-users fa-beat fa-lg" style="color: rgb(255, 249, 249);"></i></div>
                                Manajemen User
                            </a>
                            <a class="nav-link" href="index.php?p=tarif">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-dollar-sign fa-flip fa-lg" style="color: rgb(243, 161, 15);"></i></div>
                                Manajemen Tarif
                            </a>
                            <a class="nav-link" href="index.php?p=catat_meter">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-droplet fa-bounce fa-lg" style="color: rgb(116, 192, 252);"></i></div>
                                Lihat Pemakaian Warga
                            </a>
                            <!-- <a class="nav-link" href="index.php?p=pembayaran_warga">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-dollar-sign fa-flip fa-lg" style="color: rgb(243, 161, 15);"></i></i></div>
                                Pembayaran Warga
                            </a> -->
                            <!-- <a class="nav-link" href="index.php?p=ubah_datameter_warga">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-database fa-fade fa-lg" style="color: rgb(15, 243, 27);"></i></div>
                                Ubah Datameter Warga
                            </a> -->
                        <?php
                        } elseif ($level == "bendahara") {
                        ?>
                            <a class="nav-link" href="index.php?p=tarif">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-dollar-sign fa-flip fa-lg" style="color: rgb(243, 161, 15);"></i></div>
                                Manajemen Tarif
                            </a>
                            <!--<a class="nav-link" href="index.php?p=pembayaran_warga">-->
                            <!--    <div class="sb-nav-link-icon"><i class="fa-solid fa-dollar-sign fa-flip fa-lg" style="color: rgb(243, 161, 15);"></i></div>-->
                            <!--    Pembayaran Warga-->
                            <!--</a>-->
                            <!-- <a class="nav-link" href="index.php?p=ubah_datameter_warga">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-database fa-fade fa-lg" style="color: rgb(15, 243, 27);"></i></div>
                                Ubah Datameter Warga
                            </a> -->
                            <a class="nav-link" href="index.php?p=catat_meter">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-droplet fa-bounce fa-lg" style="color: rgb(116, 192, 252);"></i></div>
                                Lihat Pemakaian Warga
                            </a>
                        <?php
                        } elseif ($level == "petugas") {
                        ?>
                            <a class="nav-link" href="index.php?p=catat_meter">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-pen-to-square fa-flip fa-lg" style="color: rgb(200, 222, 20);"></i></div>
                                Catat Meter
                            </a>
                        <?php
                        } elseif ($level == "warga") {
                        ?>
                            <!--<a class="nav-link" href="index.php?p=lihat_pemakaian">-->
                            <!--    <div class="sb-nav-link-icon"><i class="fa-solid fa-droplet fa-bounce fa-lg" style="color: rgb(116, 192, 252);"></i></div>-->
                            <!--    Lihat Pemakaian-->
                            <!--</a>-->
                            <a class="nav-link" href="index.php?p=tagihan_sendiri">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-dollar-sign fa-flip fa-lg" style="color: rgb(243, 161, 15);"></i></div>
                                Lihat Tagihan Warga
                            </a>
                        <?php
                        }
                        ?>

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small"><i class="fa-solid fa-circle-user fa-beat fa-lg me-2" style="color: rgb(252, 0, 0);"></i></i> Logged in as: <?php echo $dt_user[2] ?></div>
                    <?php echo $dt_user[0] . ' (' . $dt_user[1] . ')'; ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <?php
                    // echo $_SERVER['REQUEST_URI'];
                    $e = explode("=", $_SERVER['REQUEST_URI']);
                    // echo "<BR>[0]: $e[0] --> [1]: $e[1]";
                    if (!empty($e[1])) {
                        if ($e[1] == "user" || $e[1] == "user_edit&user") {
                            $h1 = "Manajemen User";
                            $li = "Menu untuk CRUD User";
                        } elseif ($e[1] == "pemakaian_warga") {
                            $h1 = "Lihat Pemakaian Warga";
                            $li = "Lihat Data Pemakaian Air Warga";
                        } elseif ($e[1] == "pembayaran_warga") {
                            $h1 = "Lihat Pembayaran Warga";
                            $li = "Lihat Data Pembayaran Air Warga";
                        } elseif ($e[1] == "ubah_datameter_warga") {
                            $h1 = "Ubah Data Meter Warga";
                            $li = "Ubah Data Meter Air Warga";
                        } elseif ($e[1] == "tarif" || $e[1] == "tarif_edit&kd_tarif") {
                            $h1 = "Lihat Tarif Warga";
                            $li = "Lihat Tarif Pembayaran warga";
                        } elseif ($e[1] == "catat_meter" || $e[1] == "meter_edit&no") {
                            $h1 = "Catat Meter Warga";
                            $li = "Mencatat Meter Warga";
                        } elseif ($e[1] == "lihat_pemakaian") {
                            $h1 = "Lihat Pemakaian Air";
                            $li = "Lihat Pemakaian Air";
                        } elseif ($e[1] == "hasil_pemakaian") {
                            $h1 = "Hasil Pemakaian Warga";
                            $li = "Melihat Hasil pemakaian warga";
                        } elseif ($e[1] == "riwayat_pemakain") {
                            $h1 = "Riwayat Pemakain";
                            $li = "Melihat Riwayat Pemakaian";
                        } elseif ($e[1] == "tagihan_sendiri" || $e[1] == "tagihan_sendiri&no") {
                            $h1 = "Tagihan Air";
                            $li = "Melihat Tagihan Air";
                        } elseif ($e[1] == "irfan") {
                            $h1 = "Irfan Rifai";
                            $li = "4.31.24.2.15";
                        }
                    } else {
                        $h1 = "Dashboard";
                        $li = "Dashboard";
                    }
                    ?>
                    <h1 class="mt-4"><?php echo $h1 ?></h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"><?php echo $li ?></li>
                    </ol>
                    <?php
                    // echo "sesi user: ".$_SESSION['user']." sesi pass:".$_SESSION['pass'];
                    // session_destroy();
                    // echo "<BR> setelah sesion destroy: sesi user: ".$_SESSION['user']." sesi pass:".$_SESSION['pass'];
                    ?>
                    <div class="row mb-3" id="pilih_waktu">
                        <div class="col-xl-3 col-md-12">
                            <label for="sel1" class="form-label">Pilih</label>
                            <select class="form-select" id="sel1" name="pilih_waktu">
                                <option value="">Bulan</option>
                                <?php
                                $bln_ini = date('m');
                                for ($i = 1; $i <= 12; $i++) {
                                    $bulan_angka = ($i < 10) ? '0' . $i : $i;
                                    $selected = ($bulan_angka == $bln_ini) ? 'selected' : '';
                                    echo "<option value='" . date("Y") . "-" . $bulan_angka . "' $selected>" . $air->bln($i) . " " . date("Y") . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="row" id="summary">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body d-flex justify-content-center">
                                    <h1></h1>
                                    <?php
                                    if ($dt_user[2] != 'warga') {
                                        echo "<div class='ms-3'>orang</div> ";
                                    } else {
                                        echo "<div class='ms-3' id = 'hilang'></div> ";
                                    }
                                    ?>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-center">
                                    <!-- <a class="small text-white stretched-link" href="#">View Details</a> -->
                                    <?php
                                    if ($dt_user[2] != 'warga') {
                                        echo "<div class=small text-white>Pelanggan</div>";
                                    } else {
                                        echo "<div class=small text-white>Waktu Pencatatan</div>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body d-flex justify-content-center">
                                    <h1></h1>
                                    <?php
                                    if ($dt_user[2] != 'bendahara') {
                                        echo "<div class='ms-3'>m<sup>3</sup></div>";
                                    } else {
                                        echo "<div class='ms-3'>Rp</div>";
                                    }
                                    ?>

                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-center">
                                    <!-- <a class="small text-white stretched-link" href="#">View Details</a> -->
                                    <?php
                                    if ($dt_user[2] != 'bendahara') {
                                        echo "<div class=small text-white>Pemakaian Air</div>";
                                    } else {
                                        echo "<div class=small text-white>Pemasukan</div>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body d-flex justify-content-center">
                                    <h1></h1>
                                    <?php
                                    if ($dt_user[2] != 'warga') {
                                        echo "<div class='ms-3'>warga</div>";
                                    } else {
                                        echo "<div class='ms-3'>Rp</div>";
                                    }

                                    ?>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-center">
                                    <!-- <a class="small text-white stretched-link" href="#">View Details</a> -->
                                    <?php
                                    if ($dt_user[2] == 'bendahara') {
                                        echo "<div class=small text-white>Sudah Lunas</div>";
                                    } elseif ($dt_user[2] == 'warga') {
                                        echo "<div class=small text-white>Tagihan</div>";
                                    } else {
                                        echo "<div class=small text-white>Sudah Dicatat</div>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body d-flex justify-content-center">
                                    <h1></h1>
                                    <?php
                                    if ($dt_user[2] != "warga") {
                                        echo "<div class='ms-3'>warga</div>";
                                    } else {
                                        echo "<div class='ms-3'></div>";
                                    }
                                    ?>

                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-center">
                                    <!-- <a class="small text-white stretched-link" href="#">View Details</a> -->
                                    <?php
                                    if ($dt_user[2] == 'bendahara') {
                                        echo "<div class=small text-white>Belum Bayar</div>";
                                    } elseif ($dt_user[2] == 'warga') {
                                        echo "<div class=small text-white>Status Tagihan</div>";
                                    } else {
                                        echo "<div class=small text-white>Belum Dicatat</div>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="chart">
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area me-1"></i>
                                    Area Chart Example
                                </div>
                                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar me-1"></i>
                                    Bar Chart Example
                                </div>
                                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($_POST['tombol'])) {
                        $t = $_POST['tombol'];
                        if ($t == "user_add") {
                            $user = $_POST['user'];
                            $pass = password_hash($_POST['passwd'], PASSWORD_DEFAULT);
                            $pass2 = $_POST['passwd'];
                            $nama = $_POST['nama'];
                            $alamat = $_POST['alamat'];
                            $kota = $_POST['kota'];
                            $tlp = $_POST['telepon'];
                            $level = $_POST['level'];
                            $tipe = $_POST['tipe'];
                            $status = $_POST['status'];
                            //cek user apakah sudah ada atau belum di tabel user
                            $qc = mysqli_query($koneksi, "SELECT username FROM user WHERE username='$user'");
                            $qj = mysqli_num_rows($qc);
                            // echo "hasil cek user: $qj";
                            //username tidak ada
                            if (empty($qj)) {
                                mysqli_query($koneksi, "INSERT INTO user (username,password,nama,alamat,kota,tlp,level,tipe,status) VALUES ('$user','$pass',\"$nama\",'$alamat','$kota','$tlp','$level','$tipe','$status')");
                                if (mysqli_affected_rows($koneksi) > 0) {
                                    echo "<div class='alert alert-success alert-dismissible' id='alert-user'>
                                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                                    <strong>Data</strong> Berhasil Disimpan...
                                                </div>";
                                } else {
                                    echo "<div class='alert alert-success alert-dismissible' id='alert-user'>
                                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                                    <strong>Data</strong> Gagal Disimpan...
                                                </div>";
                                }
                            } else { //username kembar
                                echo "<div class='alert alert-success alert-dismissible' id='alert-user'>
                                                <button type=button class=btn-close data-bs-dismiss=alert></button>
                                                <strong>Username $user</strong> sudah ada...
                                             </div>";
                            }
                        } elseif ($t == "user_edit") {
                            $user = $_POST['user'];
                            $pass = $_POST['passwd'];
                            $nama = $_POST['nama'];
                            $alamat = $_POST['alamat'];
                            $kota = $_POST['kota'];
                            $tlp = $_POST['telepon'];
                            $level = $_POST['level'];
                            $tipe = $_POST['tipe'];
                            $status = $_POST['status'];

                            //cek passsword yang ada di tabel user
                            $qcp = mysqli_query($koneksi, "SELECT password FROM user WHERE username='$user'");
                            $dcp = mysqli_fetch_row($qcp);
                            $pass_db = $dcp[0];

                            if ($pass == $pass_db) {
                                //tidak ada perubahan data password
                                mysqli_query($koneksi, "UPDATE user SET nama=\"$nama\",alamat='$alamat',kota='$kota',tlp='$tlp',level='$level',tipe='$tipe',status='$status' WHERE username='$user'");
                            } else {
                                // ada perubahan password
                                $pass2 = password_hash($pass, PASSWORD_DEFAULT);
                                mysqli_query($koneksi, "UPDATE user SET password='$pass2',nama=\"$nama\",alamat='$alamat',kota='$kota',tlp='$tlp',level='$level',tipe='$tipe',status='$status' WHERE username='$user'");
                            }

                            if (mysqli_affected_rows($koneksi) > 0) {
                                echo "<div class='alert alert-success alert-dismissible' id='alert-user'>
                                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                                    <strong>Data</strong> Berhasil Diupdate...
                                                </div>";
                            } else {
                                echo "<div class='alert alert-danger alert-dismissible' id='alert-user'>
                                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                                    <strong>Data</strong> Tidak ada perubahan...
                                                </div>";
                            }
                        } elseif ($t == "user_hapus") {
                            $user = $_POST['user'];
                            mysqli_query($koneksi, "DELETE FROM user WHERE username='$user'");
                            if (mysqli_affected_rows($koneksi) > 0) {
                                echo "<div class='alert alert-success alert-dismissible' id='alert-user'>
                                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                                    <strong>Data</strong> Berhasil Dihapus..
                                                </div>";
                            } else {
                                echo "<div class='alert alert-success alert-dismissible' id='alert-user'>
                                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                                    <strong>Data</strong> Gagal Dihapus...
                                                </div>";
                            }
                        } elseif ($t == "tarif_add") {
                            $kd_tarif = $_POST['kd_tarif'];
                            $tarif = $_POST['tarif'];
                            $tipe_tarif = $_POST['tipe_tarif'];
                            $status = $_POST['status'];

                            $qc = mysqli_query($koneksi, "SELECT kd_tarif FROM tarif WHERE kd_tarif='$kd_tarif'");
                            $qj = mysqli_num_rows($qc);
                            // masuk ke tabel tarif
                            if (empty($qj)) {
                                mysqli_query($koneksi, "INSERT INTO tarif (kd_tarif,tarif,tipe,status) VALUES ('$kd_tarif','$tarif',\"$tipe_tarif\",'$status')");
                                if (mysqli_affected_rows($koneksi) > 0) {
                                    echo "  <div class='alert alert-success alert-dismissible' id='alert-tarif'>
                                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                                    <strong>Data</strong> Berhasil Disimpan...
                                                </div>";
                                } else {
                                    echo "  <div class='alert alert-danger alert-dismissible' id='alert-tarif'>
                                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                                    <strong>Data</strong> Gagal Disimpan...
                                                </div>";
                                }
                            } else { //Kode tarif
                                echo "  <div class='alert alert-danger alert-dismissible' id='alert-tarif'>
                                                <button type=button class=btn-close data-bs-dismiss=alert></button>
                                                <strong>Kode $kd_tarif</strong> sudah ada...
                                             </div>";
                            }
                        } elseif ($t == "tarif_edit") {
                            $kd_tarif = $_POST['kd_tarif'];
                            $tarif = $_POST['tarif'];
                            $tipe_tarif = $_POST['tipe_tarif'];
                            $status = $_POST['status'];

                            mysqli_query($koneksi, "UPDATE tarif SET tarif='$tarif',tipe='$tipe_tarif',status='$status' WHERE kd_tarif='$kd_tarif'");
                            if (mysqli_affected_rows($koneksi) > 0) {
                                echo "  <div class='alert alert-success alert-dismissible' id='alert-tarif'>
                                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                                    <strong>Data</strong> Berhasil Diubah...
                                                </div>";
                            } else {
                                echo "  <div class='alert alert-danger alert-dismissible' id='alert-tarif'>
                                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                                    <strong>Data</strong> Gagal Diubah...
                                                </div>";
                            }
                        } elseif ($t == "tarif_hapus") {
                            $kd_hapus = $_POST['kd_hapus'];
                            mysqli_query($koneksi, "DELETE FROM tarif WHERE kd_tarif='$kd_hapus'");
                            if (mysqli_affected_rows($koneksi) > 0) {
                                echo "  <div class='alert alert-success alert-dismissible id='alert-tarif'>
                                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                                    <strong>Data</strong> Berhasil Dihapus..
                                                </div>";
                            } else {
                                echo "  <div class='alert alert-danger alert-dismissible id='alert-tarif'>
                                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                                    <strong>Data</strong> Gagal Dihapus...
                                                </div>";
                            }
                        } elseif ($t == "meter_add") {
                            $username = $_POST['username'];
                            $meter_awal = $_POST['meter_awal'];
                            $meter_akhir = $_POST['meter_akhir'];
                            $status_bayar = $_POST['status_bayar'] ?? 'BLM LUNAS';
                            $kd_tarif = $air->user_to_kdtarif($username);
                            $tarif = $air->kdtarif_to_tarif($kd_tarif);
                            //cek meter awal harus lebih kecil daripada meter akhir
                            $pemakaian = $meter_akhir - $meter_awal;
                            $tagihan = $tarif * $pemakaian;
                            if ($pemakaian < 0) {
                                echo "  <div class='alert alert-danger alert-dismissible' id='alert-meter>
                                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                                    <strong>Meter Akhir</strong> Meter akhir harus lebih besar dari meter awal...
                                        </div>";
                            } else {
                                mysqli_query($koneksi, "INSERT INTO pemakaian (username,meter_awal,meter_akhir,pemakaian,tgl,waktu,kd_tarif,tagihan,status) VALUES ('$username','$meter_awal','$meter_akhir','$pemakaian',CURRENT_DATE(),CURRENT_TIME(),'$kd_tarif','$tagihan','$status_bayar')");
                                if (mysqli_affected_rows($koneksi) > 0) {
                                    echo "  <div class='alert alert-success alert-dismissible id='alert-meter'>
                                                        <button type=button class=btn-close data-bs-dismiss=alert></button>
                                                        <strong>Data</strong> Berhasil Dinput...
                                            </div>";
                                } else {
                                    echo "  <div class='alert alert-danger alert-dismissible' id='alert-meter'>
                                                        <button type=button class=btn-close data-bs-dismiss=alert></button>
                                                        <strong>Data</strong> Gagal Diinput...
                                            </div>";
                                }
                            }
                        } elseif ($t == "meter_edit") {
                            $no = $_POST['no'];
                            $meter_awal = $_POST['meter_awal'];
                            $meter_akhir = $_POST['meter_akhir'];
                            $status_bayar = $_POST['status_bayar'] ?? 'BLM LUNAS';
                            $username = $air->no_to_user($no);
                            $kd_tarif = $air->user_to_kdtarif($username);
                            $tarif = $air->kdtarif_to_tarif($kd_tarif);
                            $pemakaian = $meter_akhir - $meter_awal;
                            $tagihan = $tarif * $pemakaian;
                            if ($pemakaian < 0) {
                                echo "  <div class='alert alert-danger alert-dismissible' id=alert-meter>
                                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                                    <strong>Meter Akhir</strong> Meter akhir harus lebih besar dari meter awal...
                                        </div>";
                            } else {
                                if ($dt_user[2] == 'petugas') {
                                    mysqli_query($koneksi, "UPDATE pemakaian SET meter_awal='$meter_awal',meter_akhir='$meter_akhir',pemakaian='$pemakaian',tgl=CURRENT_DATE(),waktu=CURRENT_TIME(),tagihan='$tagihan',status='$status_bayar' WHERE no='$no'");
                                    if (mysqli_affected_rows($koneksi) > 0) {
                                        echo "  <div class='alert alert-success alert-dismissible' id=altert-meter>
                                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                                    <strong>Data</strong> Berhasil Diubah...
                                                </div>";
                                    } else {
                                        echo "  <div class='alert alert-danger alert-dismissible' id=alert-meter>
                                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                                    <strong>Data</strong> Gagal Diubah...
                                                </div>";
                                    }
                                } else {
                                    mysqli_query($koneksi, "UPDATE pemakaian SET meter_awal='$meter_awal',meter_akhir='$meter_akhir',pemakaian='$pemakaian',tagihan='$tagihan',status='$status_bayar' WHERE no='$no'");
                                    if (mysqli_affected_rows($koneksi) > 0) {
                                        echo "  <div class='alert alert-success alert-dismissible' id='alert-meter'>
                                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                                    <strong>Data</strong> Berhasil Diubah...
                                                </div>";
                                    } else {
                                        echo "  <div class='alert alert-danger alert-dismissible' id='alert-meter'>
                                                    <button type=button class=btn-close data-bs-dismiss=alert></button>
                                                    <strong>Data</strong> Gagal Diubah...
                                                </div>";
                                    }
                                }
                            }
                        } elseif ($t == "meter_hapus") {
                            $no = $_POST['no'];
                            mysqli_query($koneksi, "DELETE FROM pemakaian WHERE no='$no'");
                            if (mysqli_affected_rows($koneksi) > 0) {
                                echo "  <div class='alert alert-success alert-dismissible' id='alert-meter'>
                                                    <button type=button class=btn-close data-bs-dismiss=alert-meter></button>
                                                    <strong>Data</strong> Berhasil Dihapus..
                                                </div>";
                            } else {
                                echo "  <div class='alert alert-danger alert-dismissible' id='alert-meter'>
                                                    <button type=button class=btn-close data-bs-dismiss=alert-meter></button>
                                                    <strong>Data</strong> Gagal Dihapus...
                                                </div>";
                            }
                        }
                    } elseif (isset($_GET['p'])) {
                        $p = $_GET['p'];
                        if ($p == "user_edit") {
                            $user = $_GET['user'];
                            // echo "masuk disini untuk edit";
                            $q = mysqli_query($koneksi, "SELECT password,nama,alamat,kota,tlp,level,tipe,status FROM user WHERE username='$user' ");
                            $d = mysqli_fetch_row($q);
                            $pass = $d[0];
                            $nama = $d[1];
                            $alamat = $d[2];
                            $kota = $d[3];
                            $tlp = $d[4];
                            $level = $d[5];
                            $tipe = $d[6];
                            $status = $d[7];
                            $pass2 = password_hash($pass, PASSWORD_DEFAULT);
                        } elseif ($p == "tarif") {
                            $status = "";
                            $kd_tarif = "";
                            $status_bayar = "";
                        } elseif ($p == "tarif_edit") {
                            $kd_tarif = $_GET['kd_tarif'];
                            $q = mysqli_query($koneksi, "SELECT tipe,tarif,status FROM tarif WHERE kd_tarif='$kd_tarif' ");
                            $d = mysqli_fetch_row($q);
                            $tipe_tarif = $d[0];
                            $tarif = $d[1];
                            $status = $d[2];
                        } elseif ($p == "meter_edit") {
                            $no = $_GET['no'];
                            $q = mysqli_query($koneksi, "SELECT username,meter_awal,meter_akhir,status FROM pemakaian WHERE no='$no' ");
                            $d = mysqli_fetch_row($q);
                            $username = $d[0];
                            $meter_awal = $d[1];
                            $meter_akhir = $d[2];
                            $status_bayar = $d[3];
                        }
                    }
                    ?>
                    <div class="card mb-4" id="user_add">
                        <div class="card-header">
                            <i class="fa-solid fa-user-plus fa-beat fa-sm me-2" style="color: rgb(0, 0, 0);"></i>
                            User
                        </div>
                        <div class="card-body">
                            <form method="post" class="needs-validation" id="user_form">
                                <div class="mb-3 ">
                                    <label for="username" class="form-label">Username:</label>
                                    <input type="text" class="form-control" id="Username" placeholder="Enter Username" name="user" value="<?php echo $user ?> " required>
                                </div>
                                <div class="mb-3">
                                    <label for="pwd" class="form-label">Password:</label>
                                    <input type="password" class="form-control" id="pwd" placeholder="Enter Password" name="passwd" value="<?php echo $pass ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama:</label>
                                    <input type="text" class="form-control" id="Nama" placeholder="Enter Nama" name="nama" value="<?php echo $nama ?>" required>
                                </div>
                                <div class="mb-3 ">
                                    <label for="alamat">Alamat:</label>
                                    <textarea class="form-control" rows="5" id="alamat" name="alamat"><?php echo $alamat ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="kota" class="form-label">Kota:</label>
                                    <input type="text" class="form-control" id="Kota" placeholder="Enter Kota" name="kota" value="<?php echo $kota ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="telepon" class="form-label">Telepon:</label>
                                    <input type="text" class="form-control" id="Telepon" placeholder="Enter Telepon" name="telepon" value="<?php echo $tlp ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="level" class="form-label">Level:</label>
                                    <select class="form-select" name="level">
                                        <option value="">Level</option>
                                        <?php
                                        $lv = array("admin", "bendahara", "petugas", "warga");
                                        foreach ($lv as $lv2) {
                                            if ($level == $lv2) $sel = "SELECTED";
                                            else $sel = "";
                                            echo "<option value=$lv2 $sel>" . ucwords($lv2) . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tipe" class="form-label">Tipe:</label>
                                    <select class="form-select" name="tipe">
                                        <option value="">Tipe</option>
                                        <?php
                                        $t = array("rumah", "kost");
                                        foreach ($t as $t2) {
                                            if ($tipe == $t2) $sel = "SELECTED";
                                            else $sel = "";
                                            echo "<option value=$t2 $sel>" . ucwords($t2) . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status:</label>
                                    <select class="form-select" name="status">
                                        <option value="">Status</option>
                                        <?php
                                        $s = array("AKTIF", "NON AKTIF");
                                        foreach ($s as $s2) {
                                            if ($status == $s2) $sel = "SELECTED";
                                            else $sel = "";
                                            echo "<option value='$s2' $sel>$s2</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" name="tombol" value="user_add">Simpan</button>
                            </form>
                        </div>
                    </div>
                    <div class="card mb-4" id="tarif_add">
                        <div class="card-header">
                            <i class="fa-solid fa-sack-dollar fa-bounce fa-lg" style="color: rgb(37, 140, 109);"></i>
                            Tarif
                        </div>
                        <div class="card-body">
                            <form method="post" class="needs-validation" id="tarif_form">
                                <div class="mb-3 ">
                                    <label for="kd_tarif" class="form-label">ID Tarif:</label>
                                    <input type="text" class="form-control" id="kd_tarif" placeholder="Enter ID Tarif" name="kd_tarif" value="<?php echo $kd_tarif ?? ''; ?>" required>
                                </div>
                                <div class="mb-3 ">
                                    <label for="kd_tarif" class="form-label">Tarif:</label>
                                    <input type="number" class="form-control" id="tarif" placeholder="Enter Tarif" name="tarif" value="<?php echo $tarif ?? ''; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tipe_tarif" class="form-label">Tipe Tarif:</label>
                                    <select class="form-select" name="tipe_tarif">
                                        <option value="">Tipe Tarif</option>
                                        <?php
                                        $tt = array("rumah", "kost");
                                        foreach ($tt as $tt2) {
                                            if ($tipe_tarif == $tt2) $sel = "SELECTED";
                                            else $sel = "";
                                            echo "<option value=$tt2 $sel>" . ucwords($tt2) . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <?php
                                $st = array("AKTIF", "TIDAK AKTIF");
                                foreach ($st as $st2) {
                                    if ($status == $st2) $sel = "CHECKED";
                                    else $sel = "";
                                    echo "<div class=\"form-check form-check-inline\">
                                                <input type='radio' class='form-check-input' name='status' value='$st2' $sel>
                                                <label class='form-check-label'>$st2</label>
                                            </div>";
                                }
                                ?>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary" name="tombol" value="tarif_add">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card mb-4" id="meter_add">
                        <div class="card-header">
                            <i class="fa-brands fa-pushed fa-spin-pulse fa-lg" style="color: rgb(116, 192, 252);"></i>
                            Meter
                        </div>
                        <div class="card-body">
                            <?php
                            if ($e[1] == "meter_edit&no") $dis = 'disabled';
                            else $dis = "";
                            ?>
                            <form method="post" class="needs-validation" id="meter_form">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Nama Warga:</label>
                                    <select class="form-select" name="username" required <?php echo $dis ?>>
                                        <option value="">Nama Warga</option>
                                        <?php
                                        $qw = mysqli_query($koneksi, "SELECT username,nama FROM user WHERE level='warga'");
                                        while ($dw = mysqli_fetch_row($qw)) {
                                            if ($username == $dw[0]) $sel = "SELECTED";
                                            else $sel = "";
                                            echo "<option value=$dw[0] $sel>$dw[1] </option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3 ">
                                    <label for="meter_awal" class="form-label">Meter Awal (m<sup>3</sup>) :</label>
                                    <input type="text" class="form-control" id="meter_awal" placeholder="Enter Meter Awal " name="meter_awal" value="<?php echo $meter_awal ?? ''; ?>" required>
                                    <div id="info_meter_awal" class="form-text mt-1"></div>
                                </div>
                                <div class="mb-3 ">
                                    <label for="meter_akhir" class="form-label">Meter Akhir (m<sup>3</sup>) :</label>
                                    <input type="text" class="form-control" id="meter_akhir" placeholder="Enter Meter Akhir " name="meter_akhir" value="<?php echo $meter_akhir ?? ''; ?>" required>
                                </div>
                                <?php
                                if ($dt_user[2] != 'petugas') {
                                    echo '<div class="mb-3">
                                            <label class="form-label d-block">Status Pembayaran:</label>';
                                    $opsi = array("LUNAS", "BLM LUNAS");
                                    foreach ($opsi as $st2) {
                                        if (($status_bayar ?? "") == $st2) {
                                            $sel = "checked";
                                        } else {
                                            $sel = "";
                                        }
                                        echo "<div class=\"form-check form-check-inline\">
                                            <input type='radio' class='form-check-input' name='status_bayar' value='$st2' $sel required>
                                            <label class='form-check-label'>$st2</label>
                                        </div>";
                                    }
                                    echo '</div>';
                                } else {
                                    echo '<input type="hidden" name="status_bayar" value="BLM LUNAS">';
                                }
                                ?>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary" name="tombol" value="meter_add">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- The Modal -->
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Konfirmasi Hapus Data </h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <form method="post">
                                        <button type="submit" name="tombol" value="user_hapus" class="btn btn-danger" data-bs-dismiss="modal">YA</button>
                                    </form>
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">TIDAK</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- The Modal -->
                    <div class="modal fade" id="trModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Konfirmasi Hapus Data </h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <form method="post">
                                        <button type="submit" name="tombol" value="tarif_hapus" class="btn btn-danger" data-bs-dismiss="modal">YA</button>
                                    </form>
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">TIDAK</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card mb-4" id="user_list">
                        <div class="card-header">
                            <i class="fa-solid fa-users fa-fade fa-lg me-2" style="color: rgb(0, 0, 0);"></i>
                            DataTable User
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Kota</th>
                                        <th>Telepon</th>
                                        <th>Level</th>
                                        <th>Tipe</th>
                                        <th>Status</th>
                                        <th>Editing</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $q = mysqli_query($koneksi, "SELECT username,nama,alamat,kota,tlp,level,tipe,status FROM user ORDER BY level ASC");
                                    while ($d = mysqli_fetch_row($q)) {
                                        $user = $d[0];
                                        $nama = $d[1];
                                        $alamat = $d[2];
                                        $kota = $d[3];
                                        $tlp = $d[4];
                                        $level = $d[5];
                                        $tipe = $d[6];
                                        $status = $d[7];

                                        echo "<tr>
                                                    <td>$user</td>
                                                    <td>$nama</td>
                                                    <td>$alamat</td>
                                                    <td>$kota</td>
                                                    <td>$tlp</td>
                                                    <td>$level</td>
                                                    <td>$tipe</td>
                                                    <td>$status</td>
                                                    <td>
                                                    <a href=index.php?p=user_edit&user=$user><button type=button class='btn btn-outline-success btn-sm'>Ubah</button></a>
                                                    <button type=button class='btn btn-outline-danger btn-sm' data-bs-toggle=modal data-bs-target=#myModal data-user=$user>Hapus</button>
                                                    </td>
                                                </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card mb-4" id="tarif_list">
                        <div class="card-header">
                            <i class="fa-solid fa-money-bills fa-bounce fa-lg" style="color: rgb(19, 141, 104);"></i>
                            Data Tarif
                        </div>
                        <div class="card-body">
                            <table id="tarif_table">
                                <thead>
                                    <tr>
                                        <th>ID Tarif</th>
                                        <th>Tarif</th>
                                        <th>Tipe Tarif</th>
                                        <th>Status</th>
                                        <th>Editing</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $q = mysqli_query($koneksi, "SELECT kd_tarif,tarif,tipe,status FROM tarif ORDER BY kd_tarif ASC");
                                    while ($d = mysqli_fetch_row($q)) {
                                        $kd_tarif = $d[0];
                                        $tarif = $d[1];
                                        $tipe_tarif = $d[2];
                                        $status = $d[3];

                                        echo "<tr>
                                                    <td>$kd_tarif</td>
                                                    <td>$tarif</td>
                                                    <td>$tipe_tarif</td>
                                                    <td>$status</td>
                                                    <td>
                                                    <a href=index.php?p=tarif_edit&kd_tarif=$kd_tarif><button type=button class='btn btn-outline-success btn-sm'>Ubah</button></a>
                                                    <button type=button class='btn btn-outline-danger btn-sm' data-bs-toggle=modal data-bs-target=#trModal data-kd_tarif=$kd_tarif>Hapus</button>
                                                    </td>
                                                </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card mb-4" id="meter_list">
                        <div class="card-header">
                            <i class="fa-solid fa-house-flood-water fa-flip" style="color: rgb(58, 134, 196);"></i>
                            Meter Warga
                        </div>
                        <div class="card-body">
                            <table id="meter_table">
                                <thead>
                                    <tr>
                                        <th>Nama Warga</th>
                                        <th>Tipe</th>
                                        <th>Tanggal & Waktu</th>
                                        <th>Meter Awal (m<sup>3</sup>)</th>
                                        <th>Meter Akhir (m<sup>3</sup>)</th>
                                        <th>Pemakaian (m<sup>3</sup>)</th>
                                        <?php if ($dt_user[2] != "petugas") { ?>
                                            <th>Tagihan (Rp)</th>
                                        <?php } ?>
                                        <?php if ($dt_user[2] != "petugas") { ?>
                                            <th>Status</th>
                                        <?php } ?>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $q = mysqli_query($koneksi, "SELECT no,username,meter_awal,meter_akhir,pemakaian,tgl,waktu,tagihan,status FROM pemakaian ORDER BY tgl DESC, username ASC");
                                    while ($d = mysqli_fetch_row($q)) {
                                        $no = $d[0];
                                        $dt_user2 = $air->dt_user($d[1]);
                                        $nama = $dt_user2[0];
                                        $meter_awal = $d[2];
                                        $meter_akhir = $d[3];
                                        $pemakaian = $d[4];
                                        $tgl = $air->tgl_walik($d[5]);
                                        $waktu = $d[6];
                                        $level_login = $dt_user[2];
                                        $tagihan = $d[7];
                                        $statuspb = $d[8];
                                        $tgl_tabel = date_create($d[5]);
                                        $tgl_sekarang = date_create();
                                        $diff = date_diff($tgl_tabel, $tgl_sekarang);
                                        $selisih = $diff->days;
                                        $tipe = $air->username_tipe($d[1]);

                                        echo "<tr>
                                                    <td>$nama</td>
                                                    <td>$tipe</td>
                                                    <td>$tgl $waktu | " . date("Y-m-d") . " $selisih hari</td>
                                                    <td>$meter_awal</td>
                                                    <td>$meter_akhir</td>
                                                    <td>$pemakaian </td>";
                                        if ($dt_user[2] != "petugas") {
                                            echo "<td>" . number_format($tagihan, 0, ',', '.') . "</td>";
                                        }
                                        if ($dt_user[2] != "petugas") {
                                            if ($statuspb == "LUNAS") {
                                                $warna_btn = "btn-success"; // Hijau
                                            } else {
                                                $warna_btn = "btn-danger";  // Merah
                                            }
                                            echo "<td><button type='button' class='btn $warna_btn'>$statuspb</button></td>";
                                        }
                                        if ($level_login == "admin" || $level_login == "bendahara") {
                                            echo "<td>
                                                        <a href=index.php?p=meter_edit&no=$no><button type=button class='btn btn-outline-success btn-sm'>Ubah</button></a>
                                                        <button type=button class='btn btn-outline-danger btn-sm' data-bs-toggle=modal data-bs-target=#trModal data-no=$no>Hapus</button>
                                                </td>";
                                        } else {
                                            if ($selisih <= 30) {
                                                echo "<td>
                                                        <a href=index.php?p=meter_edit&no=$no><button type=button class='btn btn-outline-success btn-sm'>Ubah</button></a>
                                                        <button type=button class='btn btn-outline-danger btn-sm' data-bs-toggle=modal data-bs-target=#trModal data-no=$no>Hapus</button>
                                                    </td>";
                                            } else {
                                                echo "<td></td>";
                                            }
                                        }
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card mb-4" id="tagihan_sendiri_list">
                        <div class="card-header">
                            <i class="fa-solid fa-house-flood-water fa-flip" style="color: rgb(58, 134, 196);"></i>
                            Data Pemakaian & Pembayaran
                        </div>
                        <div class="card-body">
                            <table id="tagihan_sendiri_table">
                                <thead>
                                    <tr>
                                        <th>Waktu Pencatatan Meter</th>
                                        <th>Kode Tarif</th>
                                        <th>Meter Awal (m<sup>3</sup>)</th>
                                        <th>Meter Akhir (m<sup>3</sup>)</th>
                                        <th>Pemakaian (m<sup>3</sup>)</th>
                                        <?php if ($dt_user[2] != "petugas") { ?>
                                            <th>Tagihan (Rp)</th>
                                            <th>Status</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $user_login = $_SESSION['user'];
                                    $q = mysqli_query($koneksi, "SELECT * FROM pemakaian WHERE username = '$user_login' ORDER BY tgl DESC");
                                    while ($d = mysqli_fetch_row($q)) {
                                        $tgl        = $air->tgl_walik($d[5]);
                                        $waktu      = $d[6];
                                        $kd_tarif   = $d[7];
                                        $meter_awal = $d[2];
                                        $meter_akhir = $d[3];
                                        $pemakaian  = $d[4];
                                        $tagihan    = $d[8];
                                        $statuspb   = $d[9];

                                        echo "<tr>
                                                    <td>$tgl $waktu</td>
                                                    <td>$kd_tarif</td>
                                                    <td>$meter_awal</td>
                                                    <td>$meter_akhir</td>
                                                    <td>$pemakaian</td>
                                                    <td> " . number_format($tagihan, 0, ',', '.') . "</td>";

                                        $warna_btn = ($statuspb == "LUNAS") ? "btn-success" : "btn-danger";
                                        echo "<td><button type='button' class='btn $warna_btn btn-sm'>$statuspb</button></td>
                                                </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2026</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>
</body>

</html>
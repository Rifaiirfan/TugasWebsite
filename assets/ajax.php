<?php
include '../assets/func.php';
$air = new klas_air;
$koneksi = $air->koneksi();
if (isset($_POST['p'])) {
    $p = $_POST['p'];
    if ($p == "summary") {
        $bln = $_POST['t'];
        $user = $_POST['user'];
        $level = $_POST['level'];
        $response = [];

        // Query dasar untuk Admin, Petugas, dan Bendahara
        $q1 = mysqli_query($koneksi, "SELECT COUNT(username) as jml FROM user WHERE level='warga'");
        $d1 = mysqli_fetch_assoc($q1);
        $response['jml_pelanggan'] = $d1['jml'] ?? 0;

        if ($level == 'admin' || $level == 'petugas') {
            $q2 = mysqli_query($koneksi, "SELECT SUM(pemakaian) as jml_p FROM pemakaian WHERE tgl LIKE '$bln%'");
            $d2 = mysqli_fetch_assoc($q2);
            $response['jml_pemakaian'] = $d2['jml_p'] ?? 0;

            $q3 = mysqli_query($koneksi, "SELECT COUNT(username) as sdh FROM pemakaian WHERE tgl LIKE '$bln%'");
            $d3 = mysqli_fetch_assoc($q3);
            $response['sdh_dicatat'] = $d3['sdh'] ?? 0;
        } elseif ($level == 'bendahara') {
            $q4 = mysqli_query($koneksi, "SELECT SUM(tagihan) as masuk FROM pemakaian WHERE tgl LIKE '$bln%' AND status = 'LUNAS'");
            $d4 = mysqli_fetch_assoc($q4);
            $response['pemasukan'] = $d4['masuk'] ?? 0;

            $q5 = mysqli_query($koneksi, "SELECT COUNT(status) as lunas FROM pemakaian WHERE tgl LIKE '$bln%' AND status = 'LUNAS'");
            $d5 = mysqli_fetch_assoc($q5);
            $response['lunas'] = $d5['lunas'] ?? 0;
        } else { // Level Warga
            $q_warga = mysqli_query($koneksi, "SELECT pemakaian, tagihan, status, waktu ,tgl FROM pemakaian WHERE tgl LIKE '$bln%' AND username = '$user'");
            $dw = mysqli_fetch_assoc($q_warga);
            $response['pemakaian_warga'] = $dw['pemakaian'] ?? 0;
            $response['tagihan_warga'] = $dw['tagihan'] ?? 0;
            $response['status_warga'] = $dw['status'] ?? '-';
            $response['jam'] = $dw['waktu'] ?? '-';
            $response['bln'] = $dw['tgl'] ?? '-';
        }
        echo json_encode($response);
    } elseif ($p == "meter_awal") {
        $username = mysqli_real_escape_string($koneksi, $_POST['username']);
        $q = mysqli_query($koneksi, "SELECT meter_akhir, status FROM pemakaian WHERE username='$username' ORDER BY no DESC LIMIT 1");
        $d = mysqli_fetch_assoc($q);
        if ($d) {
            echo json_encode(['meter_akhir' => $d['meter_akhir'], 'status' => $d['status']]);
        } else {
            echo json_encode(['meter_akhir' => '', 'status' => '']);
        }
    }
}

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
        if ($level == 'admin') {
            $q1 = mysqli_query($koneksi, "SELECT COUNT(username) as jml_pelanggan FROM user WHERE level='warga'");
            $d1 = mysqli_fetch_assoc($q1);
            $data[0] = array('jml_pelanggan' => $d1['jml_pelanggan']);

            $q2 = mysqli_query($koneksi, "SELECT SUM(pemakaian) as jml_pemakaian FROM pemakaian WHERE tgl LIKE '$bln%'");
            $d2 = mysqli_fetch_assoc($q2);
            $data[1] = array('pemakaian' => $d2['jml_pemakaian']);

            $q3 = mysqli_query($koneksi, "SELECT COUNT(username) as sdh_dicatat FROM pemakaian WHERE tgl LIKE '$bln%'");
            $d3 = mysqli_fetch_assoc($q3);
            $data[2] = array('tercatat' => $d3['sdh_dicatat']);
        } elseif ($level == 'bendahara') {
            $q1 = mysqli_query($koneksi, "SELECT COUNT(username) as jml_pelanggan FROM user WHERE level='warga'");
            $d1 = mysqli_fetch_assoc($q1);
            $data[3] = array('jml_pelanggan' => $d1['jml_pelanggan']);

            $q4 = mysqli_query($koneksi, "SELECT SUM(tagihan) as pemasukan FROM pemakaian WHERE tgl LIKE '$bln%'");
            $d4 = mysqli_fetch_assoc($q4);
            $data[4] = array('pemasukan' => $d4['pemasukan']);

            $q5 = mysqli_query($koneksi, "SELECT COUNT(status) as lunas FROM pemakaian WHERE tgl LIKE '$bln%' AND status LIKE 'LUNAS'");
            $d5 = mysqli_fetch_assoc($q5);
            $data[5] = array('lunas' => $d5['lunas']);
        } elseif ($level == 'petugas') {
            $q1 = mysqli_query($koneksi, "SELECT COUNT(username) as jml_pelanggan FROM user WHERE level='warga'");
            $d1 = mysqli_fetch_assoc($q1);
            $data[6] = array('jml_pelanggan' => $d1['jml_pelanggan']);

            $q2 = mysqli_query($koneksi, "SELECT SUM(pemakaian) as jml_pemakaian FROM pemakaian WHERE tgl LIKE '$bln%'");
            $d2 = mysqli_fetch_assoc($q2);
            $data[7] = array('pemakaian' => $d2['jml_pemakaian']);

            $q3 = mysqli_query($koneksi, "SELECT COUNT(username) as sdh_dicatat FROM pemakaian WHERE tgl LIKE '$bln%'");
            $d3 = mysqli_fetch_assoc($q3);
            $data[8] = array('tercatat' => $d3['sdh_dicatat']);
        } else {
            $q6 = mysqli_query($koneksi, "SELECT waktu as jam FROM pemakaian WHERE tgl LIKE '$bln%' AND username = '$user' ");
            $d6 = mysqli_fetch_assoc($q6);
            $data[9] = array('jam' => $d6['jam']);

            $q7 = mysqli_query($koneksi, "SELECT pemakaian as pemakaian_warga FROM pemakaian WHERE tgl LIKE '$bln%' AND username = '$user' ");
            $d7 = mysqli_fetch_assoc($q7);
            $data[11] = array('pemakaian_warga' => $d7['pemakaian_warga']);

            $q8 = mysqli_query($koneksi, "SELECT tagihan as tagihan_warga FROM pemakaian WHERE tgl LIKE '$bln%' AND username = '$user' ");
            $d8 = mysqli_fetch_assoc($q8);
            $data[12] = array('tagihan_warga' => $d8['tagihan_warga']);

            $q9 = mysqli_query($koneksi, "SELECT status as status_warga FROM pemakaian WHERE tgl LIKE '$bln%' AND username = '$user' ");
            $d9 = mysqli_fetch_assoc($q9);
            $data[13] = array('status_warga' => $d9['status_warga']);
        }
        echo json_encode($data);
    }
}

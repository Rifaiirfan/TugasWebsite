<?php

include './assets/func.php';
$air = new klas_air;
$username = $_POST['username'];
echo $air->meter_terakhir($username);

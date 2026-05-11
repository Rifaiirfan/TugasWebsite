<?php
session_start();

//hapus semua sesi
session_destroy();
echo"<script>window.location.replace('../index.php')</script>";
?>
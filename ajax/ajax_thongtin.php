<?php 
include ("configajax.php"); 
if ($_SESSION['language'] == 'vi') {
    $_SESSION['language'] = "vi";
    $lang = 'vi';
} elseif ($_SESSION['language'] == 'en') {
    $_SESSION['language'] = "en";
    $lang = 'en';
} else {
    $lang = 'vi';
}
?>
<?php
$hoten = $_POST['hoten'];
$diachi = $_POST['diachi'];
$email = $_POST['email'];
$dienthoai = $_POST['dienthoai'];

$_SESSION['thongtin']['hoten'] = $hoten;
$_SESSION['thongtin']['diachi'] = $diachi;
$_SESSION['thongtin']['email'] = $email;
$_SESSION['thongtin']['dienthoai'] = $dienthoai;
?>
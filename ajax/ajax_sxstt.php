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

$sapxepstt = $_POST['sapxepstt'];
$danhmuc = $_POST['danhmuc'];
$_SESSION['sapxep']['sapxepstt'] = $sapxepstt;
$_SESSION['sapxep']['list'] = $danhmuc;
?>

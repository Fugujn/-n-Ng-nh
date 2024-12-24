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

$brands = $_POST['brands'];
$danhmuc = $_POST['danhmuc'];
$_SESSION['searchf']['brands'] = $brands;
$_SESSION['searchf']['list'] = $danhmuc;

?>

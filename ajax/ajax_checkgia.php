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

$gia = $_POST['gia'];
// $id = $_POST['id'];
?>
<?= $showgia = price_sp($gia); ?>

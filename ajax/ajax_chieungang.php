<?php
include ("configajax.php");

$widthwindow = $_POST['widthwindow'];
if($widthwindow < 768){
    $_SESSION['chieungang'] = 4;
} else {
    $_SESSION['chieungang'] = 5;
}

?>

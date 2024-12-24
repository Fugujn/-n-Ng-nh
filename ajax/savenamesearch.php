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

$name_search = $_POST['name_search'];
$_SESSION['savenamesearch'] = $name_search;

?>

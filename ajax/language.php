<?php
session_start();
include_once _lib . "config.php";

include_once _lib . "constant.php";
include_once _lib . "functions.php";
include_once _lib . "functions_giohang.php";
include_once _lib . "class.database.php";
include_once _lib . "file_requick.php";
include_once _source . "counter.php";
include_once _source . "useronline.php";
include_once _lib . "paging_ajax.php";

if (isset($_REQUEST['language'])) {
    $language = $_REQUEST['language'];
    $_SESSION['language'] = $language;
}
?>
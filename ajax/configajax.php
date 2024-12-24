<?php

session_start();
@define('_source', '../sources/');
@define('_lib', '../bphomepanel/lib/');
@define(_upload_folder, 'media/upload/');

include_once _lib . "config.php";
include_once _lib . "constant.php";
include_once _lib . "functions.php";
include_once _lib . "functions_giohang.php";
include_once _lib . "class.database.php";
include_once _lib . "paging_ajax.php";
$d = new database($config['database']);

if ($_SESSION['language'] == 'vi') {
    $_SESSION['language'] = "vi";
    $lang = 'vi';
} elseif ($_SESSION['language'] == 'en') {
    $_SESSION['language'] = "en";
    $lang = 'en';
} elseif ($_SESSION['language'] == 'sp') {
    $_SESSION['language'] = "sp";
    $lang = 'sp';    
} else {
    $_SESSION['language'] = "vi";
    $lang = 'vi';
}
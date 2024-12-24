<?php
session_start();
@define('_source', '../sources/');
@define('_lib', '../lib/');


$lang = $_SESSION['lang']; //Lấy ngỗn ngữ
include_once _lib . "config.php";
include_once _lib . "constant.php";
include_once _lib . "functions.php";
include_once _lib . "functions_giohang.php";
include_once _lib . "class.database.php";
include_once _lib . "paging_ajax.php";
$d = new database($config['database']);

$lang = $_SESSION['ad_language'];
if($lang != ''){
    include _source ."adminlang_".$lang.".php";
    
}else{
    include _source ."adminlang_vi.php";
    
}

$thang = $_POST['thang'];
$nam = $_POST['nam'];

$_SESSION['thang'] = $thang;
$_SESSION['nam'] = $nam;
?>
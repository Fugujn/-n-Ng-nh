<?php

if (!defined('_lib'))
    die("Error");
date_default_timezone_set('Asia/Ho_Chi_Minh');
$config_url = $_SERVER["SERVER_NAME"];
$config['database']['servername'] = 'localhost';
$config['database']['username'] = 'hogia_user';
$config['database']['password'] = 'jhcWSCpJ';
$config['database']['database'] = 'hogia_data';
$config['database']['refix'] = 'table_';

$config["All_lang"] = array("vi" => "Nội dung");
$config["lang"] = array("vi");
if (count($config["lang"]) == 1) {
    $config["All_lang"] = array("vi" => "Nội dung");
}

?>
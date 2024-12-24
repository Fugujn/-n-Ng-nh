<?php

if (!defined('_source'))
    die("Error");
//check($_POST);

if (isAjaxRequest()) {

    if ($_POST['act'] == "add") {

        addtocart($_POST['id'], $_POST['sl'], $_POST['price']);

        echo json_encode(array("num" => get_total()));
        die();
    }
}

if($_GET['act'] == "fill"){
	include _template."giohang_tpl.php";
	die;

}
?>
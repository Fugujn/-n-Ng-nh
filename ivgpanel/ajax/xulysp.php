<?php

session_start();
@define('_template', '../templates/');
@define('_source', '../sources/');
@define('_lib', '../lib/');
error_reporting(0);
include_once _lib . "config.php";
include_once _lib . "constant.php";
include_once _lib . "functions.php";
include_once _lib . "library.php";
include_once _lib . "class.database.php";

$d = new database($config['database']);
$act = $_REQUEST['act'];

//dump($_POST);
switch ($act) {
    case 'delete':
        deletesp();
        break;
    case 'capnhat':
        update_voucher();
        break;
    case 'capnhattab':
        update_coupon();
        break;
    case 'update-giakm':
        update_giakm();
        break;
    case 'load_search':
        load_search();
        break;
    case 'capnhathinhanh':
        update_active_cm();
        break;
}

function deletesp() {
    global $d;
    $id = $_POST['id'];
    $table = $_POST['table'];
    $d->reset();
        $sql = "select * from #_$table where id='" . $id . "'";
        $d->query($sql);
        if ($d->num_rows() > 0) {
            while ($row = $d->fetch_array()) {
                unlink('../../upload/product/'. $row['photo']);
                unlink('../../upload/thumb/'. $row['thumb']);
                $d->reset();
                $sql1 = "select * from table_product_hinhanh where id_photo='" . $id . "'";
                $d->query($sql1);
                if ($d->num_rows() > 0) {
                    $rs = $d->result_array();
                    foreach ($rs as $v) {
                        unlink('../../upload/product/' . $v['photo']);
                        unlink('../../upload/thumb/' . $v['thumb']);
                        $sql = "delete from table_product_hinhanh where id='" . $v["id"] . "'";
                        $d->query($sql);
                    }
                }
            }
            $sql = "delete from #_$table where id='" . $id . "'";
            $d->query($sql);
        }
    echo $id;
}

function update_active_cm() {
    global $d;
    $id = $_POST['id'];
    $d->reset();
    $sql = "select hienthi from #_hinhanh where id='" . $id . "' ";
    $d->query($sql);
    $rs = $d->fetch_array();

    if ($rs["hienthi"] == 1) {
        $data["hienthi"] = 0;
    } else {
        $data["hienthi"] = 1;
    }
    $d->setTable("hinhanh");
    $d->setWhere("id", $id);
    $d->update($data);
    echo $data["hienthi"];
}

function update_voucher() {
    global $d;
    $id = $_POST['id'];
    $fiel = $_POST['fiel'];
    $table = $_POST['table'];
    $d->reset();
    $sql = "select $fiel from #_$table where id='" . $id . "' ";
    $d->query($sql);
    $rs = $d->fetch_array();

    if ($rs["$fiel"] == 1) {
        $data["$fiel"] = 0;
        
    } else {
        $data["$fiel"] = 1;
    }
    $d->setTable($table);
    $d->setWhere("id", $id);
    $d->update($data);
    echo json_encode(array('idp'=>$id,'sta'=>$data["$fiel"]));
}

function update_active_dm() {
    global $d;
    $id = $_POST['id'];
    $d->reset();
    $sql = "select active from #_comment where id='" . $id . "' ";
    $d->query($sql);
    $rs = $d->fetch_array();

    if ($rs["active"] == 1) {
        $data["active"] = 0;
    } else {
        $data["active"] = 1;
    }
    $d->setTable("comment");
    $d->setWhere("id", $id);
    $d->update($data);
    echo $data["active"];
}

function update_coupon() {
    global $d;
    $id = $_POST['id'];
    $fiel = $_POST['fiel'];
    $table = $_POST['table'];
    $d->reset();
    $sql = "select $fiel from #_$table where id='" . $id . "' ";
    $d->query($sql);
    $rs = $d->fetch_array();

    if ($rs["$fiel"] == 1) {
        $data["$fiel"] = 0;
    } else {
        $data["$fiel"] = 1;
    }
    $d->setTable($table);
    $d->setWhere("id", $id);
    $d->update($data);
    echo $data["fiel"];
}

function update_giakm() {
    global $d;
    $id = $_POST["id"];
    if ($_POST["func"] == "giakm") {
        $data["giakm"] = $_POST["gia"];
    } else {
        $data["gia_cou"] = $_POST["gia"];
    }
    $d->setTable("product");
    $d->setWhere("id", $id);
    if ($d->update($data)) {
        echo "Cập nhật thành công!";
    } else {
        echo "Cập nhật thất bại!";
    }
}

?>
<?php

include ("configajax.php");

switch ($_REQUEST['type']) {
    case 'update_qty':
        updateQty();
        break;
    case 'remove_order':
        delete_order();
        break;
    case 'clear_coupon':
        Clearcoupon();
        break;
    case 'loadcart':
        loadcart();
        break;
}

function loadcart() {
    $str = "<table class='table table-bordered service-list' border='0' cellpadding='5px' cellspacing='1px' style='font-size:13px;' width='100%'>";

    if (is_array($_SESSION['cart'])) {
        $str .= '<tr  style="font-weight:bold;color:#111;font-weight:bold">
            <th width="5%" align="center" style="border-left: none"></th>
            <th width="10%" style="border-left: none; text-align:center; text-transform:uppercase;white-space: normal;">Hình</th>
            <th width="85%" style="border-left: none; text-align:center; text-transform:uppercase;white-space: normal;">Tên SP</th>
            

            </tr>';
        $max = count($_SESSION['cart']);
        for ($i = 0; $i < $max; $i++) {
            $pid = $_SESSION['cart'][$i]['productid'];
            $size = $_SESSION['cart'][$i]['size'];
            if ($size != '') {
                $psize = get_product_size($size);
            } else {
                $size = 0;
            }
            $q = $_SESSION['cart'][$i]['qty'];
            $pname = get_product_name($pid);
            if ($q == 0)
                continue;

            $str .= '<tr id="' . md5($pid) . '" style="background:#fff;padding:4px 0">';

            $str .= '<td width="5%" style="border-left:none;" align="center"><a href=javascript:del(' . $pid . ',"' . md5($pid) . '")><img src="assets/images/icon_del.png" border="0" /></a></td>';

            $str .= "<td width='10%' style='white-space: normal;'><img style='max-height: 50px;' src='" . _upload_product_l . get_product_image($pid) . "'  alt='" . $pname . "' /></td>";

            $str .= "<td width='85%' style='border-left:none; text-align:left;white-space: normal;'>
                    <span> " . $pname . "</span>";

            $str .= "</td></tr>";
        }
    }else {
        $str .= "<div style='text-align: center;padding: 20px;'>Chưa có sản phẩm trong giỏ hàng</div>";
    }

    $str .= "</table>";
    echo count($_SESSION['cart']);
}

function Clearcoupon() {
    unset($_SESSION['couple']);
    $kq = number_format(get_order_total($_POST["user"]), 0, ",", ".") . "VNĐ";
    echo $kq;
}

function updateQty() {
    $id = $_POST['id'];
    $qty = $_POST['qty'];
    $tmp = array();
    foreach ($_SESSION['cart'] as $k => $v) {
        if ($v['productid'] == $id) {
            $v['qty'] = $qty;
        }
        $tmp[$k] = $v;
    }
    $_SESSION['cart'] = $tmp;
    echo number_format(get_order_total(), 0, ',', '.');
}

function delete_order() {
    $id = $_POST["id"];
    $size = $_POST["size"];
    $color = $_POST["color"];
    remove_product($id,$size,$color);
    $total = number_format(get_order_total(),0,',','.') .' đ';
    $number = count($_SESSION['cart']);
    echo json_encode(array("id" => $id, "total" => $total, "num" => $number));
}


?>
<?php
session_start();
global $lang;

function get_product_name($pid) {
    global $d, $row, $lang;
    $sql = "select ten_$lang as ten from #_product where id=$pid";
    $d->query($sql);
    $row = $d->fetch_array();
    return $row['ten'];
}

function get_product_image($pid) {
    global $d, $row;
    $sql = "select photo from #_product where id=$pid";
    $d->query($sql);
    $row = $d->fetch_array();
    return $row['photo'];
}

function get_price($pid) {
    global $d, $row;
    $sql = "select gia from table_product where id=$pid";
    $d->query($sql);
    $row = $d->fetch_array();
    return $row['gia'];
}

function remove_product($pid) {
    $pid = intval($pid);
    $max = count($_SESSION['cart']);
    for ($i = 0; $i < $max; $i++) {
        if ($pid == $_SESSION['cart'][$i]['productid']) {
            unset($_SESSION['cart'][$i]);
            break;
        }
    }
    $_SESSION['cart'] = array_values($_SESSION['cart']);
    
}

function get_order_total() {
    $max = count($_SESSION['cart']);
    $sum = 0;
    for ($i = 0; $i < $max; $i++) {
        $pid = $_SESSION['cart'][$i]['productid'];
        $q = $_SESSION['cart'][$i]['qty'];
        $price = get_price($pid);
        $sum+=$price * $q;
    }
    return $sum;
}

function get_total() {
    $max = count($_SESSION['cart']);
    $sum = 0;
    for ($i = 0; $i < $max; $i++) {
        $pid = $_SESSION['cart'][$i]['productid'];
        $q = $_SESSION['cart'][$i]['qty'];
        $sum+=$q;
    }
    return $sum;
}

function addtocart($pid, $q, $price) {

    if ($pid < 1 or $q < 1)
        return;

    if (is_array($_SESSION['cart'])) {
        if (product_exists($pid,$q,$price))
            return;
        $max = count($_SESSION['cart']);
        $_SESSION['cart'][$max]['productid'] = $pid;
        $_SESSION['cart'][$max]['price'] = $price;
        $_SESSION['cart'][$max]['qty'] = $q;
    }
    else {
        $_SESSION['cart'] = array();
        $_SESSION['cart'][0]['productid'] = $pid;
        $_SESSION['cart'][0]['price'] = $price;
        $_SESSION['cart'][0]['qty'] = $q;
    }

    redirect("http://$config_url/gio-hang.html");
}

function product_exists($pid,$q,$price) {
    $pid = intval($pid);
    $max = count($_SESSION['cart']);
    $flag = 0;
    for ($i = 0; $i < $max; $i++) {
        if ($pid == $_SESSION['cart'][$i]['productid'] && $price == $_SESSION['cart'][$i]['price']) {
            $_SESSION['cart'][$i]['qty'] = $_SESSION['cart'][$i]['qty'] + $q;
            $flag = 1;
            break;
        }
    }
    return $flag;
}

?>
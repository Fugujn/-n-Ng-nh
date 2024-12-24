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
?>
<?php
$checkma = $_POST['checkma'];
$totalsum = $_POST['totalsum'];
$d->reset();
$sql = "select * from #_icon where com = 'magiamgia' and ten_vi = '" . $checkma . "'";
$d->query($sql);
$giamgia = $d->result_array();

if(count($giamgia) > 0) {
    $checkma = $giamgia[0]['ten_vi'];
    $checkout = $totalsum - ($totalsum * $giamgia[0]['gia'] / 100);

    $str = "<td colspan='5'>";
    $str .= "<div class='total-order' style='width:100%;float:left;margin-top:10px;text-align: right'>";
    $str .= "<b style='font-weight: bold;font-size:16px;color:#f64a5f;font-weight: normal'>";
    $str .= "<span style='font-weight: bold;'>";
    $str .= "Mã giảm giá : " . $giamgia[0]['gia'] . "%";
    $str .= "</span>";
    $str .= "</b>";
    $str .= "</div>";
    $str .= "<input type='hidden' name='magiam' id='magiam' value='".$giamgia[0]['ten_vi']."'>";
    $str .= "</td>";

    $str2 = "<td colspan='5'>";
    $str2 .= "<div class='total-order' style='width:100%;float:left;margin-top:10px;text-align: right'>";
    $str2 .= "<b style='font-weight: bold;font-size:16px;color:#f64a5f;font-weight: normal'>";
    $str2 .= "<span style='font-weight: bold;'>";
    $str2 .= "Thanh toán : " . price_sp($checkout);
    $str2 .= "</span>";
    $str2 .= "</b>";
    $str2 .= "</div>";
    $str2 .= "</td>";


    $str3 = "<p style='color:green'>Đã áp dụng mã thành công. Bạn được giảm ".$giamgia[0]['gia']."%</p>";
} else {
    $checkma = "";
    $str = "";
    $str3 = "<p style='color:red'>Mã giảm giá không đúng. Vui lòng kiểm tra lại</p>";
}

echo json_encode(array("checkma" => $checkma, "textchange" => $str, "totalcheckout" => $str2, "checkma_text" => $str3));
?>


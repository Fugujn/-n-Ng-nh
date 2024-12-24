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
$districtship = $_POST['districtship'];

if($districtship != ''){
	$d->reset();
	$sql = "select * from table_icon where com='quanhuyen' and hienthi = 1 and id = '".$districtship."' ";
	$d->query($sql);
	$result_d = $d->fetch_array();
	$_SESSION['thongtin']['ship'] = $result_d['gia'];
	$_SESSION['thongtin']['shipid'] = $result_d['id'];
	$_SESSION['thongtin']['shipname'] = $result_d['ten_vi'];
	//$str = "<span style='color:red'>Phí giao hàng :".number_format($result_d['gia'],0,',','.')." đ</span>";
    //echo json_encode(array("giaodien" => $str, "loai" => '1'));
}/*else{
	$str = "<span style='color:red'>Lỗi phí giao hàng.</span>";
    echo json_encode(array("giaodien" => $str, "loai" => '0'));
}*/
?>
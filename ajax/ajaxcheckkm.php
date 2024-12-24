<?php
include ("configajax.php");

$checkkm = $_POST['checkkm'];

$d->reset();
$sql = "select * from #_icon where hienthi = 1 and ten_vi = '".$checkkm."'";
$d->query($sql);
$checkma = $d->result_array();

$phamtramgiam = $checkma[0]['gia'];

if(count($checkma) > 0) {
	$_SESSION['giamgia']['ma'] = $checkkm;
	$_SESSION['giamgia']['phamtram'] = $phamtramgiam;
} else {
	$_SESSION['giamgia']['ma'] = 'loi';
	$_SESSION['giamgia']['phamtram'] = 'loi';
}

/*$max = count($_SESSION['cart']);
for ($i = 0; $i < $max; $i++) {
	$pid = $_SESSION['cart'][$i]['productid'];
	$d->reset();
	$sql = "select phantramgiam from #_product where hienthi = 1 and id = '".$pid."'";
	$d->query($sql);
	$checkpro = $d->fetch_array();
	if($checkpro != '' && $checkpro > 0){
		
	}
}*/

?>


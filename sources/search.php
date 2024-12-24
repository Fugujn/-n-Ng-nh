
<?php

if (!defined('_source'))
    die("Error");
if($_SESSION['sapxep']['sapxepstt'] == ''){
    $sapxeppro = 'order by stt, ngaytao desc';
}
if($_SESSION['sapxep']['sapxepstt'] == 'sx1'){
    $sapxeppro = 'order by noibat desc';
}
if($_SESSION['sapxep']['sapxepstt'] == 'sx2'){
    $sapxeppro = 'order by ngaytao desc';
}
if($_SESSION['sapxep']['sapxepstt'] == 'sx3'){
    $sapxeppro = 'order by gia';
}
if($_SESSION['sapxep']['sapxepstt'] == 'sx4'){
    $sapxeppro = 'order by gia desc';
}
//echo $_POST['min_price'].'--'.$_POST['max_price'];exit;
$valuetitle = $_SESSION['savenamesearch'];

$where = " where hienthi=1 and type = 'san-pham' ";
if ($valuetitle != ''){
    $where .= " and masp like '%" . $valuetitle . "%'";
    unset($_SESSION['searchf']);
}
  $getchuoitren = getCurrentPageURL();
  $catchuoi = explode('?danhmuc=',$getchuoitren);
  $catchuoi1 = explode('&brand=',$catchuoi[1]);
  
  // if($catchuoi[1] != ''){
  //   alert('ok1');
    
  //   $catchuoi1 = explode('&brand=',$catchuoi[1]);

  //   $_SESSION['searchf']['brands'] = $catchuoi1[0];
  //   $_SESSION['searchf']['list'] = $catchuoi1[1];
  // } else {
  //   alert('ok');
  // }


  $getbrands = $catchuoi1[1];
  $getlist = $catchuoi1[0];
  $_SESSION['searchf']['brands'] = $getbrands;
  $_SESSION['searchf']['list'] = $getlist;

  $checkbrands = explode(',',$getbrands);


  if($checkbrands != ''){
    $checkcount = count($checkbrands) - 1;
    // alert($checkcount);
    if($checkcount == 1){
      $where .= " and thuonghieu = '".$checkbrands[0]."' and find_in_set('" . $getlist . "',list_id)>0 ";
    }
    if($checkcount > 1){
      for ($i=0; $i < $checkcount ; $i++) { 
        if($i==0){
          $where .= " and find_in_set('" . $getlist . "',list_id)>0 and ( thuonghieu = '".$checkbrands[$i]."' ";
        }elseif($i == (count($checkbrands)-1)){
          $where .= " or thuonghieu = '".$checkbrands[$i]."' ";
        }else{
          $where .= " or thuonghieu = '".$checkbrands[$i]."' ";
        }

      }
      $where .= " )"; 
    }
    
  }
 

$maxR = 28;
$maxP = 4;

$uri = $_SERVER['REQUEST_URI'];
$numberp = explode('&p=',$uri);
$pcheck = $numberp[1];
if($pcheck == '' || $pcheck == 1) {
    $idlimit = 0;
    $limit_start = 0;
    $limit_end = $maxR;
} else {
    $idlimit = $pcheck;
    $limit_start = ($idlimit - 1) * $maxR;
    $limit_end = $maxR;
}


$sql = "select REPLACE('ten_$lang', 'd', 'đ'),ten_$lang as ten, spbc, noibat, giakm, tenkhongdau,photo,thumb,id,masp,mota_$lang as mota,gia,phantramgiam from #_product " . $where . " " . $sapxeppro . " limit " . $limit_start . "," . $limit_end . "";
// alert($sql);
$d->query($sql);

$count_search = $d->num_rows();
$product = $d->result_array();


$sql = "select REPLACE('ten_$lang', 'd', 'đ'),ten_$lang as ten, spbc, noibat, giakm, tenkhongdau,photo,thumb,id,masp,mota_$lang as mota,gia,phantramgiam from #_product " . $where . " " . $sapxeppro . "";
$d->query($sql);
$countproduct = $d->result_array();


$curPage = isset($pcheck) ? $pcheck : 1;
$url = getCurrentPageURL();
$paging = paging_home($countproduct, $url, $curPage, $maxR, $maxP);
// $product = $paging['source'];
?>
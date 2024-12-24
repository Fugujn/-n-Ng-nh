<?php
include ("configajax.php");

$thang123 = $_POST['thang'];
$nam = $_POST['nam'];


$d->reset();
$sql = "select * from #_setting ";
$d->query($sql);
$rs_setting = $d->fetch_array();


$d->reset();
if ($thang123 == '' && $nam == '') {
    $sql = "select * from table_donhang  ";
} elseif ($nam == '') {
    $sql = "select * from table_donhang where thang = '" . $thang123 . "' ";
} elseif ($thang123 == '') {
    $sql = "select * from table_donhang where nam = '" . $nam . "' ";
} else {
    $sql = "select * from table_donhang where thang = '" . $thang123 . "' and nam = '" . $nam . "'";
}
$sql .= " order by id desc";
$d->query($sql);
$quanlyorder1 = $d->result_array();

$d->reset();
if ($thang123 == '' && $nam == '') {
    $sql = "select SUM(tonggia) as a from table_donhang ";
} elseif ($nam == '') {
    $sql = "select SUM(tonggia) as a from table_donhang where thang = '" . $thang123 . "'";
} elseif ($thang123 == '') {
    $sql = "select SUM(tonggia) as a from table_donhang where nam = '" . $nam . "'";
} else {
    $sql = "select SUM(tonggia) as a from table_donhang where thang = '" . $thang123 . "' and nam = '" . $nam . "' ";
}

$d->query($sql);
$tongorder = $d->fetch_array();
?>

<div class="tableajax" style="opacity: 0">
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-8" style="margin-bottom: 10px;padding: 0px">
    <input type="button" value="Tìm kiếm" class="btn btn-success" onclick="clicksearch_order(event)"/>
    <a href="index.php?com=order&act=man&id=0&thang=<?= $thang123 ?>&nam=<?= $nam ?>" class="btn btn-success" style="float: right">Export Excel</a>
</div>

<div class="clearfix"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="card ">
            <div class="card-header">
               
                <a href="" class="btn btn-success "><i class="icon-pencil3"></i> &nbsp;Đơn hàng</a>

                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
                <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th style="width:5%" align="center">ID</th>
                            <th style="width:10%">Mã</th>   
                            <th style="width:25%">Họ tên</th>
                            <th style="width:10%">Ngày đặt</th>
                            <th style="width:10%">Số tiền</th>
                            <th style="width:15%">HTTT</th>                
                            <th style="width:10%">Tình trạng</th>     
                            <th style="width:5%">Xem</th>
                            <th style="width:5%">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        for ($i = 0, $count = count($quanlyorder1); $i < $count; $i++) {?>
                            <tr>
                                <td style="width:5%"><?= $i + 1?></td>
                                <td style="width:10%"><?= $quanlyorder1[$i]['madonhang'] ?></td>      
                                <td style="width:25%">
                                    <a style="text-decoration:none;">
                                        <?= $quanlyorder1[$i]['hoten'] ?><br>
                                        (<?= $quanlyorder1[$i]['email'] ?>)
                                    </a>
                                    <?php if ($quanlyorder1[$i]['hienthi'] == 0) { ?>
                                        <span class="tag tag-pill tag-default tag-info tag-default">New</span>
                                    <?php } ?>
                                </td>
                                <td style="width:10%"><?= date('d/m/Y', $quanlyorder1[$i]['ngaytao']) ?></td>          
                                <td style="width:10%"><?=number_format($quanlyorder1[$i]['tonggia'],0,',','.').'đ'?></td> 
                                <td style="width:15%"><?php
                                if ($quanlyorder1[$i]['httt'] == 1) {
                                    echo 'Thanh toán khi nhận hàng';
                                } else if ($quanlyorder1[$i]['httt'] == 2) {
                                    echo 'Thanh toán bảo kim';
                                } else if ($quanlyorder1[$i]['httt'] == 3) {
                                    echo 'Thanh toán ngân lượng';
                                } else {
                                    echo 'Thanh toán paypal';
                                }
                                ?></td>
                                <td style="width:10%">
                                    <?php if($quanlyorder1[$i]['trangthai'] == 1){ ?>
                                        <span style="color:red">Mới đặt</span>
                                    <?php } elseif($quanlyorder1[$i]['trangthai'] == 2){ ?>
                                        <span style="color:red">Đã xác nhận</span>
                                    <?php } elseif($quanlyorder1[$i]['trangthai'] == 3){ ?>
                                        <span style="color:red">Đang giao hàng</span>
                                    <?php } elseif($quanlyorder1[$i]['trangthai'] == 4){ ?>
                                        <span style="color:green">Đã giao</span>
                                    <?php } elseif($quanlyorder1[$i]['trangthai'] == 5){ ?>
                                        <span>Đã hủy</span>
                                    <?php } ?>
                                </td>

                                <td style="width:5%">
                                    <a href="index.php?com=order&act=edit&type=<?=$_REQUEST['type']?>&id=<?= $quanlyorder1[$i]['id'] ?>">
                                        <i class="icon-sliders" style='font-size: 1.4rem;color:#55595c'></i>
                                    </a>
                                </td>
                                <td style="width:5%"><a href="index.php?com=order&act=delete&type=<?=$_REQUEST['type']?>&id=<?= $quanlyorder1[$i]['id'] ?>" onClick="if (!confirm('Xác nhận xóa'))
                                    return false;"><i class="icon-trash-o" style='font-size: 1.4rem;color:#55595c'></i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
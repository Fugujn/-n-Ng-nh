<script language="javascript">
    function clicksearch_order() {
        var nam = document.getElementById('getnam').value;
        var thang = document.getElementById('getthang').value;
        //alert(nam);
        $.ajax({
            url: "ajax/ajax_date_2.php",
            data: {nam: nam, thang: thang},
            type: "post",
            success: function (trave) {
                // alert(trave);
                $('.ajaxorder').html(trave);
                $('.tableajax').animate({opacity: '1'});
            }
        });
    }
</script>
<script type="text/javascript">
    function doEnter(evt) {
        var key;
        if (evt.keyCode == 13 || evt.which == 13) {
            onSearch(evt);
        }
    }
    function onSearch(evt) {
        var keyword = document.getElementById("keyword").value;
        var price = document.getElementById("price").value;
        //var encoded = Base64.encode(keyword);
        location.href = "index.php?com=order&act=man&keyword=" + keyword + "&price=" + price;
        loadPage(document.location);

    }

</script>
<style type="text/css">
    .table th, .table td {
    padding: 0.75rem 1rem;
}
</style>
<?php
$thangnamhientai = time();
$ngayhientai = date('d', $thangnamhientai);
$thanghientai = date('m', $thangnamhientai);
$namhientai = date('Y', $thangnamhientai);
?>

<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">Thống kê đơn hàng</h2>
  </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-3 col-lg-2" style="margin-bottom: 10px;padding:0px;padding-right: 5px;">
    <select name="getthang" class="form-control input" id="getthang" >
        <option value="">Chọn tháng</option>
        <option value="1">Tháng 1</option>
        <option value="2">Tháng 2</option>
        <option value="3">Tháng 3</option>
        <option value="4">Tháng 4</option>
        <option value="5">Tháng 5</option>
        <option value="6">Tháng 6</option>
        <option value="7">Tháng 7</option>
        <option value="8">Tháng 8</option>
        <option value="9">Tháng 9</option>
        <option value="10">Tháng 10</option>
        <option value="11">Tháng 11</option>
        <option value="12">Tháng 12</option>
    </select>
</div>
<div class="col-xs-12 col-sm-12 col-md-3 col-lg-2" style="margin-bottom: 10px;padding:0px;padding-right: 5px;">
    <select name="getnam" class="form-control input" id="getnam" >
        <option value="">Chọn năm</option>
        <?php
        $d->reset();
        $sql = "SELECT DISTINCT nam FROM table_donhang ";
        $d->query($sql);
        $locnam = $d->result_array();
        for ($i = 0; $i < count($locnam); $i++) {
            ?>
            <option value="<?= $locnam[$i]['nam'] ?>">
                Năm <?= $locnam[$i]['nam'] ?>        
            </option>
        <?php } ?>
    </select>
</div>
<div class="ajaxorder">
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-8" style="margin-bottom: 10px;padding: 0px">
    <input type="button" value="Tìm kiếm" class="btn btn-success" onclick="clicksearch_order(event)"/>
    <a href="index.php?com=order&act=man&id=0" class="btn btn-success" style="float: right">Export Excel</a>
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
                            <!-- <th style="width:15%">HTTT</th>                 -->
                            <th style="width:10%">Tình trạng</th>     
                            <th style="width:5%">Xem</th>
                            <th style="width:5%">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        for ($i = 0, $count = count($items); $i < $count; $i++) {?>
                            <tr>
                                <td style="width:5%"><?= $i + 1?></td>
                                <td style="width:10%"><?= $items[$i]['madonhang'] ?></td>      
                                <td style="width:25%">
                                    <a style="text-decoration:none;">
                                        <?= $items[$i]['hoten'] ?><br>
                                    </a>
                                    <?php if ($items[$i]['hienthi'] == 0) { ?>
                                        <span class="tag tag-pill tag-default tag-info tag-default">New</span>
                                    <?php } ?>
                                </td>
                                <td style="width:10%"><?= date('d/m/Y', $items[$i]['ngaytao']) ?></td>          
                                <td style="width:10%"><?=number_format($items[$i]['tonggia'],0,',','.').'đ'?></td> 
                                <!-- <td style="width:15%">
                                    <?php if($items[$i]['phuongthuc'] == 'nhan-hang') { ?>
                                        Thanh toán khi nhận  hàng
                                    <?php } elseif($items[$i]['phuongthuc'] == 'noi-dia') { ?>
                                        Thanh toán thẻ ngân hàng
                                    <?php } ?>
                                    
                                </td> -->
                                <td style="width:10%">
                                    <?php if($items[$i]['trangthai'] == 1){ ?>
                                        <span style="color:red">Mới đặt</span>
                                    <?php } elseif($items[$i]['trangthai'] == 2){ ?>
                                        <span style="color:red">Đã xác nhận</span>
                                    <?php } elseif($items[$i]['trangthai'] == 6){ ?>
                                        <span style="color:red">Đang đặt cọc</span>
                                    <?php } elseif($items[$i]['trangthai'] == 3){ ?>
                                        <span style="color:red">Đang giao hàng</span>
                                    <?php } elseif($items[$i]['trangthai'] == 4){ ?>
                                        <span style="color:green">Đã hoàn thành</span>
                                    <?php } elseif($items[$i]['trangthai'] == 5){ ?>
                                        <span>Đã hủy</span>
                                    <?php } ?>
                                </td>

                                <td style="width:5%">
                                    <a href="index.php?com=order&act=edit&type=<?=$_REQUEST['type']?>&id=<?= $items[$i]['id'] ?>">
                                        <i class="icon-sliders" style='font-size: 1.4rem;color:#55595c'></i>
                                    </a>
                                </td>
                                <td style="width:5%"><a href="index.php?com=order&act=delete&type=<?=$_REQUEST['type']?>&id=<?= $items[$i]['id'] ?>" onClick="if (!confirm('Xác nhận xóa'))
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
<!-- Striped rows end -->
<nav aria-label="Page navigation" style="text-align: center;">
    <ul class="pagination pagination-sm">
    <?= $paging['paging'] ?>
    </ul>
</nav>
</div>
<div class="clearfix"></div>

<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">Chi tiết đơn hàng</h2>
  </div>
</div>
<form name="frm" method="post" action="index.php?com=order&act=save" enctype="multipart/form-data" class="form">

<section id="basic-form-layouts">
<div class="card mb-0">
    <div class="card-header">
        <h4 class="card-title" id="basic-layout-colored-form-control">Thông tin người đặt</h4>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="card-body collapse in">
        <div class="card-block">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <b class="mb-1 display-block" style="color:#F00;">Thông tin người đặt</b>
                    <p class="text-muted">Họ tên : <?= @$item['hoten'] ?></p>        
                    <p class="text-muted">Điện thoại : <?= @$item['dienthoai'] ?></p>
                    <p class="text-muted">Email : <?= @$item['email'] ?></p>       
                    <p class="text-muted">Địa chỉ : <?= @$item['diachi'] ?></p>   
                    <p class="text-muted">Mã đơn hàng : <?= @$item['madonhang'] ?></p>
                </div>
                <!-- <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <b class="mb-1 display-block" style="color:#F00;">Thông tin thêm</b>
                    <p class="text-muted">Tỉnh/Thành phố : <?= get_add($item['city'])['ten_vi'] ?></p>        
                    <p class="text-muted">Quận/Huyện  : <?= get_add($item['district'])['ten_vi'] ?></p>
                    <p class="text-muted">Phường : <?= @$item['ward'] ?></p>       
                    <p class="text-muted">Phí giao hàng : <?=number_format($item['ship'],0,',','.').' đ'?></p>   
                    <p class="text-muted">Mã giảm giá : <?= @$item['magiamgia'] ?></p>
                </div> -->
            </div>
        </div>
    </div>
</div>
</section>

<section id="basic-form-layouts" class="mt-1">
<div class="card mb-0">
    <div class="card-header">
        <h4 class="card-title" id="basic-layout-colored-form-control">Thông tin giỏ hàng</h4>
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
                            <th style="width:5%" align="center">Stt</th> 
                            <th style="width:5%">Mã số</th>
                            <th style="width:15%">Hình ảnh</th>
                            <th style="width:20%">Diễn dải</th>  
                            <th style="width:15%">Giá bán</th>              
                            <th style="width:10%">Số lượng</th>  
                            <th style="width:15%">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $d->reset();
                    $sql = "select * from #_donhang_detail where id_order = '".$item['madonhang']."'";
                    $d->query($sql);
                    $orderdetail = $d->result_array();
                        for ($i = 0, $count = count($orderdetail); $i < $count; $i++) {
                            $d->reset();
                            $sql = "select * from #_product where hienthi = 1 and id = '".$orderdetail[$i]['id_product']."'";
                            $d->query($sql);
                            $detailproduct = $d->result_array();
                            ?>
                            <tr>
                                <td style="width:5%"><?= $i + 1?></td> 
                                <td style="width:10%"><?= $detailproduct[0]['masp'] ?></td>      
                                <td style="width:25%">
                                    <img src="../upload/product/imgproduct/<?= $detailproduct[0]['photo'] ?>" style="max-width:100px;vertical-align: middle;" />
                                </td>
                                <td style="width:20%">
                                    <?= $detailproduct[0]['ten_vi'] ?>
                                </td>          
                                <td style="width:15%"> 
                                    <?= price_sp($orderdetail[$i]['gia']) ?>
                                </td>
                                <td style="width:10%">
                                    <?= $orderdetail[$i]['soluong'] ?>
                                </td>

                                <td style="width:5%">
                                    <?= price_sp($orderdetail[$i]['gia']*$orderdetail[$i]['soluong']) ?>
                                </td>
                               
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

    </div>
</div>
</section>
<div style="float: left;width:100%;background: #fff;" class="mb-1">
    <div class="card-body collapse in">
        <div class="card-block">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <b class="mb-1 display-inline-block">Tổng giá bán:</b>
                    <a style="font-size:15px;"><?= price_sp($item['tonggia']) ?></a><br/>

                    <!-- <b class="mb-1 display-inline-block">Phương thức:</b>
                    <?php if($item['phuongthuc'] == 'nhan-hang') { ?>
                        Thanh toán khi nhận  hàng
                    <?php } elseif($item['phuongthuc'] == 'noi-dia') { ?>
                        Thanh toán thẻ ngân hàng
                    <?php } ?> -->
                    <br/>
                    <b class="mb-1 display-inline-block">Ghi chú</b>
                    <div><?= $item['ghichu'] ?></div>  
                    <br/>
                    <b class="mb-1 display-block">Nội dung</b> 
                    <input type="text" name="noidung" value="<?= $item['noidung'] ?>" class="form-control input" /><br />
                    <b class="mb-1 display-inline-block">Tình trạng</b>
                    <select id="id_tinhtrang" name="id_tinhtrang" class="form-control input">
                        <option value='1' <?php if($item['trangthai'] == 1) { ?> selected="selected" <?php } ?>>Mới đặt</option>
                        <option value='2' <?php if($item['trangthai'] == 2) { ?> selected="selected" <?php } ?>>Đã xác nhận</option>
                        <option value='6' <?php if($item['trangthai'] == 6) { ?> selected="selected" <?php } ?>>Đã đặt cọc</option>
                        <option value='3' <?php if($item['trangthai'] == 3) { ?> selected="selected" <?php } ?>>Đang giao hàng</option>
                        <option value='4' <?php if($item['trangthai'] == 4) { ?> selected="selected" <?php } ?>>Đã hoàn thành</option>
                        <option value='5' <?php if($item['trangthai'] == 5) { ?> selected="selected" <?php } ?>>Đã hủy</option>
                    </select>
                    <br/>
                </div>
            </div>
        </div>
    </div>
</div>   
    <input type="hidden" name="id" id="id" value="<?= @$item['id'] ?>" />

    <button type="submit" class="btn btn-success mr-1">
        <i class="icon-check2"></i> Lưu
    </button>
    <button type="button" class="btn btn-warning " onclick="javascript:window.location = 'index.php?com=order&act=man'">
        <i class="icon-cross2"></i> Thoát
    </button>

</form>
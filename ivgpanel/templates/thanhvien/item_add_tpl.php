<script>
    function showdetail(id){
        $('.showkhung' + id).slideToggle(400);   
    }
</script>
<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">Thông tin thành viên</h2>
  </div>
</div>
<section id="basic-form-layouts">
<div class="card mb-0">
    <div class="card-header">
        <h4 class="card-title" id="basic-layout-colored-form-control">Thông tin chung</h4>
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
                    <!-- <b class="mb-1 display-block" style="color:#F00;">Thông tin cá nhân</b> -->
                    <p class="text-muted">Họ tên : <?= @$item['name'] ?></p>        
                    <p class="text-muted">Điện thoại : <?= @$item['dienthoai'] ?></p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                   
                    <p class="text-muted">Email : <?= @$item['user'] ?></p>       
                    <p class="text-muted">Địa chỉ : <?= @$item['diachi'] ?></p> 
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<section id="basic-form-layouts" class="mt-1">
<div class="card mb-0">
    <div class="card-header">
        <h4 class="card-title" id="basic-layout-colored-form-control">Lịch sử</h4>
        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
        <div class="heading-elements">
            <ul class="list-inline mb-0">
                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="card-body collapse in">
        <ul class="nav nav-tabs mt-1 pl-1">
            <li class="nav-item">
                <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">Mua hàng</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">Đổi thưởng</a>
            </li>
        </ul>
        <div class="tab-content px-1 pt-1">
            <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
            

                <div class="infoorder">
                    <?php
                    $d->reset();
                    $sql = "select * from #_donhang where iduser = '" . $item['id'] . "' order by ngaytao desc ";
                    $d->query($sql);
                    $showorder = $d->result_array();

                    if (count($showorder) > 0) {
                        for ($i = 0; $i < count($showorder); $i++) {
                        

                            $d->reset();
                            $sql = "select * from #_icon where ten_vi = '".$showorder[$i]['magiamgia']."'";
                            $d->query($sql);
                            $ptgiamgia = $d->fetch_array();
                            ?>
                            <div class="ordercon pt-1 pb-1" style="border-bottom: 1px solid #ccc;">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <p  class="text-muted"><?=change_lang('Mã số hóa đơn','Order Code')?> : <a><?= $showorder[$i]['madonhang'] ?></a></p>
                                        <p  class="text-muted"><?=change_lang('Trạng thái','Status')?> : <a><?= date('H:i:s d/m/Y', $showorder[$i]['ngaytao']) ?> - <?= tinhtrang($showorder[$i]['trangthai']) ?></a></p>
                                        <p  class="text-muted"><?=change_lang('Mã giảm giá','Sale Code')?> : <a><?= $showorder[$i]['magiamgia'] ?></a></p>
                                        <p class="text-success"><?=change_lang('Tổng tiền','Total Prices')?> : <a><?= price_sp($showorder[$i]['tonggia']) ?></a></p>
                                        <?php if($showorder[$i]['magiamgia'] != '') { ?>
                                            <p class="text-success"><?=change_lang('Mã giảm','Sale Code')?> : - <a><?= price_sp($showorder[$i]['tonggia'] * $ptgiamgia['gia'] / 100) ?></a></p>
                                        <?php } ?>
                                        <?php if($showorder[$i]['ship']!= ''){?>
                                        <p class="text-success"><?=change_lang('Phí giao hàng','Fee ship')?> : <a><?= price_sp($showorder[$i]['ship']) ?></a></p>
                                        <?php } ?>
                                        <p class="text-success"><?=change_lang('Thanh toán','Payment')?> : <a><?= price_sp(($showorder[$i]['tonggia'] - ($showorder[$i]['tonggia'] * $ptgiamgia['gia'] / 100))+$showorder[$i]['ship']) ?></a></p>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <p  class="text-muted"><?=change_lang('Họ tên','Fullname')?> : <a><?= $showorder[$i]['hoten'] ?></a></p>
                                        <p  class="text-muted"><?=change_lang('Điện thoại','Phone')?> : <a><?= $showorder[$i]['dienthoai'] ?></a></p>
                                        <p  class="text-muted"><?=change_lang('Địa chỉ','Address')?> : <a><?= $showorder[$i]['diachi'] ?></a></p>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                               
                                <a class="btn btn-danger" href="javascript:void(0)" onclick="showdetail('<?= $i ?>')" >Xem chi tiết <i class="icon-ios-arrow-down"></i></a>

                                <div class="clearfix"></div>
             
                                <div class="orderdetail showkhung<?= $i ?>" style="display:none;">
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Stt</th>
                                                    <th>Hình ảnh</th>
                                                    <th>Tên</th>
                                                    <th>Đơn giá</th>
                                                    <th>SL</th>
                                                    <th>Tổng giá</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $d->reset();
                                            $sql = "select * from #_donhang_detail where id_nguoimua = '" . $showorder[$i]['iduser'] . "' and id_order = '".$showorder[$i]['id']."' ";
                                            $d->query($sql);
                                            $showorderdetail = $d->result_array();
                                            for ($j = 0; $j < count($showorderdetail); $j++) {
                                        
                                                $pid = $showorderdetail[$j]['id_product'];
                                                $size = $showorderdetail[$j]['size'];
                                                $color = $showorderdetail[$j]['color'];
                                                $q = $showorderdetail[$j]['soluong'];

                                                ?>
                                            <tr>
                                              
                                                <td style="width:5%;"><?= $j+1 ?></td>
                                                <td style="width:15%;">
                                                    <img onerror='this.src="../images/no-image.jpg"' src="<?=_upload_thumb.get_product_image($pid)?>" style="max-width: 100px;height: auto;" >
                                                </td>
                                                
                                                <td style="width:25%;"><?=get_product_name($pid)?></td>
                                                <td style="width:15%;">
                                                    <?php 
                                                    $price1 = get_price($pid);
                                                    $price2 = get_product_size($size)['gia'];
                                                    $price3 = $sum1;
                                                    $price = $price1 + $price2 + $price3;
                                                ?>
                                                <p style="margin-top:10px;color:#6B6B6B"><?=number_format($price,0,',','.')?>&nbsp;đ </p>
                                                </td>
                                               
                                                <td style="width:10%;">
                                                    <?= $q ?>  
                                                </td>
                                                <td style="width:15%;">
                                                    <?=number_format($price*$q,0,',','.')?> đ
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        </table>
                                    </div> 
                                </div> <!--######### END showkhung ######## -->
                                <div class="clearfix"></div>
                            </div> <!--######### END ordercon ######## -->
                        <?php } ?>
                    <?php } else { ?>
                        <p>Bạn chưa có đơn hàng nào</p>
                    <?php } ?>
                </div>
                <div class="clear"></div>

                
            </div>
            <div role="tabpanel" class="tab-pane" id="tab2" aria-expanded="false" aria-labelledby="base-tab2">
                Thông tin đang cập nhật ... <br><br>
            </div>
             
        </div>
    </div>
</div>
</section>


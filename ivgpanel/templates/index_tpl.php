<?php 
    $d->reset();
    $sql = "select id from #_product where type='san-pham'";
    $d->query($sql);
    $rs_prosuct= $d->num_rows();

    $d->reset();
    $sql = "select id from #_donhang";
    $d->query($sql);
    $rs_order= $d->num_rows();

    $d->reset();
    $sql = "select id from #_dknhantin";
    $d->query($sql);
    $rs_dknt= $d->num_rows();

    $d->reset();
    $sql = "select id from #_counter";
    $d->query($sql);
    $rs_online= $d->num_rows();
?>

    <div class="row">
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left">
                                <h3 class="pink"><?=$rs_prosuct?></h3>
                                <span>Sản phẩm</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-bag2 pink font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left">
                                <h3 class="deep-orange"><?=$rs_order?></h3>
                                <span>Đơn hàng</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-bag deep-orange font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left">
                                <h3 class="cyan"><?=$rs_dknt?></h3>
                                <span>Liên hệ</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-envelope-o cyan font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-body text-xs-left">
                                <h3 class="teal"><?=$rs_online?></h3>
                                <span>Tổng truy cập</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-user1 teal font-large-2 float-xs-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ stats -->

<script type="text/javascript">
    /*function onSearch(evt) {
        var tungay = document.getElementById("tungay").value;
        var denngay = document.getElementById("denngay").value;
        window.location = "index.php?com=index&tungay=" + tungay +"&denngay=" + denngay + "";
    }*/
    function getdata(){
        var monthchart = document.getElementById("monthchart").value;
        var yearchart = document.getElementById("yearchart").value;
        window.location = "index.php?com=index&m=" + monthchart +"&y=" + yearchart + "";
    }
</script>
<?php 
    /*if ($_REQUEST['tungay'] != '' && $_REQUEST['denngay'] != '') {
        $tungay = strtotime(str_replace('/','-',$_REQUEST['tungay']));
        $denngay = strtotime(str_replace('/','-',$_REQUEST['denngay']));
        echo $tungay.'-'.$denngay;
        //$sql.=" and ngaytao >= " . $tungay . " and ngaytao <= ".$denngay."";
    }*/
?>
    <section id="chartjs-bar-charts">
    <!-- Bar Chart -->
    <!-- <input type="text" id="tungay" autocomplete="off" value="<?=$_REQUEST['tungay']?>">
    <input type="text" id="denngay" autocomplete="off" value="<?=$_REQUEST['denngay']?>">
    <input type="button" value="Tìm" style="border:none;background: #515151;color:#fff;padding: 9px 15px;" onclick="onSearch(event)"> -->
    
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thống kê truy cập &nbsp;&nbsp;&nbsp;
                    <select name="monthchart" id="monthchart" style="padding: 5px;font-weight: normal;font-size: 14px;">
                        <option value="">Chọn tháng</option>
                        <?php for ($i=1; $i <= 12 ; $i++) { ?>
                            <option value="<?=$i?>" <?php if($i == $_REQUEST['m']){?> selected <?php } ?> >Tháng <?=$i?></option>
                        <?php } ?> 
                    </select>
                    <?php $tg = date('d-m-Y',time()); $arrtg = explode('-', $tg)?>
                    <select name="yearchart" id="yearchart" style="padding: 5px;font-weight: normal;font-size: 14px;">
                        <option value="">Chọn năm</option>
                        <?php for ($j=2020; $j <= $arrtg[2] ; $j++) { ?>
                            <option value="<?=$j?>" <?php if($j == $_REQUEST['y']){?> selected <?php } ?>>Tháng <?=$j?></option>
                        <?php } ?> 
                    </select>
                    <a class="btn btn-success" onclick="getdata()" style="color:#fff;cursor: pointer;">Lọc dữ liệu</a>
                    </h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <!-- <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                            <li><a data-action="reload"><i class="icon-reload"></i></a></li> -->
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                            <!-- <li><a data-action="close"><i class="icon-cross2"></i></a></li> -->
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block">
                        <canvas id="bar-chart" height="800"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

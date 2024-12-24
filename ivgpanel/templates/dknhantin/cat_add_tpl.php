
<style type="text/css">
    .productcon{width:308px;float:left;line-height: 0px;margin-left:35px;margin-bottom: 30px;}
    .productcon1{margin-left:0px;}
    .baoanhsp{width: 100%;float:left;line-height: 0px;overflow: hidden}
    .anhsp12
    {   
        line-height: 0px;
        width:100%;
        -moz-transition: all 1s;
        -webkit-transition: all 1s;
        transition: all 1s;
    }
    .anhsp12:hover
    {
        -moz-transform: scale(1.2);
        -webkit-transform: scale(1.2);
        transform: scale(1.2);
    }
    .info_product{width: 100%;float:left;margin-top:20px;text-align: center}
    .baotensp{float:left;width:100%;margin-top:10px;}
    .baotensp p{line-height:20px;}
    .baotensp a{color:#3c8287;font-size:18px;transition: all .5s;text-transform: uppercase;}
    .productcon:hover .baotensp{bottom: 0%;transition: all 0.5s;opacity: 1}
    /*.baotensp a:hover{color:#bd0606;}*/
    .baogia{float:left;margin-top:10px;text-align: center;width: 100%}
    .baogia p{line-height: 20px;}
    .baogia a{font-weight: bold;font-size:18px;color:#934922;}
</style>
<div class="content-header row">
  <div class="content-header-left col-md-6 col-xs-12 mb-1">
    <h2 class="content-header-title">Quản lý thông tin khách hàng</h2>
  </div>
</div>

<form name="frm" method="post" action="index.php?com=dknhantin&act=save_cat" enctype="multipart/form-data" class="form">

<button type="button" class="btn btn-warning " onclick="javascript:window.location = 'index.php?com=dknhantin&act=man_cat'">
    <i class="icon-cross2"></i> Thoát
</button>
<div class="clearfix"></div>    
<div class="row mt-1">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-success " href="#"><i class="icon-pencil3"></i> &nbsp;Thông tin</a>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in px-1 py-1">
                <b class="mb-1 display-block">Tên khách hàng</b> <input type="text" name="ten_en" id="ten_en" value="<?= $item['ten_en'] ?>" class="form-control input" /><br />
                <b class="mb-1 display-block">Điện thoại</b> <input type="text" name="dienthoai" id="dienthoai" value="<?= $item['dienthoai'] ?>" class="form-control input" /><br />
                <b class="mb-1 display-block">Email</b> <input type="text" name="email" id="email" value="<?= $item['email'] ?>" class="form-control input" /><br />
                <b class="mb-1 display-block">Tiêu đề</b> <input type="text" name="email" id="email" value="<?= $item['tieude'] ?>" class="form-control input" /><br />
                <b class="mb-1 display-block">Nội dung</b> <textarea name="noidung"  class="form-control input1" cols="50" rows="3" id="noidung"><?= @$item['noidung'] ?></textarea><br />
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<button type="button" class="btn btn-warning " onclick="javascript:window.location = 'index.php?com=dknhantin&act=man_cat'">
    <i class="icon-cross2"></i> Thoát
</button>


</form>
<?php
$d->reset();
$sql = "select * from table_dknhantin where hienthi = 0 and type = 1 ";
$d->query($sql);
$checkgui = $d->result_array();

$d->reset();
$sql = "select * from table_donhang where hienthi = 0 order by id desc";
$d->query($sql);    
$checkgui1 = $d->result_array();
?>
<!-- navbar-fixed-top-->
<nav class="header-navbar navbar navbar-with-menu navbar-light navbar-fixed-top navbar-shadow">
  <div class="navbar-wrapper">
    <div class="navbar-header">
      <ul class="nav navbar-nav">
        <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
        <li class="nav-item">
            
        </li>
        <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
      </ul>
    </div>
    <div class="navbar-container content container-fluid">
      <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
        <ul class="nav navbar-nav">
          <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5">         </i></a></li>
          <!-- <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link-expand"><i class="ficon icon-expand2"></i></a></li> -->
        
        </ul>
        <ul class="nav navbar-nav float-xs-right">
          <!-- <li class="dropdown dropdown-language nav-item">
            <a id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="flag-icon flag-icon-gb"></i><span class="selected-language">English</span>
            </a>
            <div aria-labelledby="dropdown-flag" class="dropdown-menu">
                <a href="#" class="dropdown-item"><i class="flag-icon flag-icon-gb"></i> English</a>
                <a href="#" class="dropdown-item"><i class="flag-icon flag-icon-fr"></i> French</a>
                <a href="#" class="dropdown-item"><i class="flag-icon flag-icon-cn"></i> Chinese</a>
                <a href="#" class="dropdown-item"><i class="flag-icon flag-icon-de"></i> German</a></div>
          </li> -->
          <li class="dropdown dropdown-notification nav-item"><a href="#" data-toggle="dropdown" class="nav-link nav-link-label"><i class="ficon icon-bell4"></i><span class="tag tag-pill tag-default tag-danger tag-default tag-up"><?=count($checkgui1) ?></span></a>
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
              <li class="dropdown-menu-header">
                <h6 class="dropdown-header m-0"><span class="grey darken-2">Đơn hàng</span><span class="notification-tag tag tag-default tag-danger float-xs-right m-0"><?=count($checkgui1) ?> đơn</span></h6>
              </li>
              <li class="list-group scrollable-container">
                <?php for ($i = 0; $i < count($checkgui1); $i++) { ?>
                <a href="index.php?com=order&act=edit&id=<?= $checkgui1[$i]['id'] ?>" class="list-group-item">
                  <div class="media">
                    <div class="media-left valign-middle"><i class="icon-cart3 icon-bg-circle bg-cyan"></i></div>
                    <div class="media-body">
                      <h6 class="media-heading">Bạn có đơn hàng mới !</h6>
                      <p class="notification-text font-small-3 text-muted"><?= $checkgui1[$i]['hoten'] ?></p><small>
                        <time class="media-meta text-muted"><?=date('d-m-Y H:s',$checkgui1[$i]['ngaytao'])?></time></small>
                    </div>
                  </div>
                </a>
                <?php } ?>
                </li>
              <li class="dropdown-menu-footer"><a href="index.php?com=order&act=man" class="dropdown-item text-muted text-xs-center">Xem toàn bộ đơn</a></li>
            </ul>
          </li>
          <li class="dropdown dropdown-notification nav-item"><a href="#" data-toggle="dropdown" class="nav-link nav-link-label"><i class="ficon icon-mail6"></i><span class="tag tag-pill tag-default tag-info tag-default tag-up"><?=count($checkgui) ?></span></a>
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
              <li class="dropdown-menu-header">
                <h6 class="dropdown-header m-0"><span class="grey darken-2">Tin nhắn</span><span class="notification-tag tag tag-default tag-info float-xs-right m-0"><?=count($checkgui) ?> tin</span></h6>
              </li>
              <li class="list-group scrollable-container">
                <?php for ($i = 0; $i < count($checkgui); $i++) {?>
                <a href="index.php?com=dknhantin&act=edit_cat&id=<?= $checkgui[$i]['id'] ?>" class="list-group-item">
                  <div class="media">
                    <div class="media-left"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="media/images/avatar-s-1.png" alt="avatar"><i></i></span></div>
                    <div class="media-body">
                      <h6 class="media-heading"><?= $checkgui[$i]['ten_en'] ?></h6>
                      <p class="notification-text font-small-3 text-muted">Thông tin liên hệ</p><small>
                        <time class="media-meta text-muted"><?=date('d-m-Y H:s',$checkgui[$i]['ngaytao'])?></time></small>
                    </div>
                  </div>
                </a>
                <?php } ?>
              </li>
              <li class="dropdown-menu-footer"><a href="index.php?com=dknhantin&act=man_cat" class="dropdown-item text-muted text-xs-center">Xem tất cả tin nhắn</a></li>
            </ul>
          </li>
          <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img src="media/images/avatar-s-1.png" alt="avatar"><i></i></span><span class="user-name"><?=$_SESSION['login']['username']?></span></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="index.php?com=user&act=admin_edit" class="dropdown-item"><i class="icon-head"></i> Tài khoản</a>
              <a href="index.php?com=dknhantin&act=man_cat" class="dropdown-item"><i class="icon-mail6"></i> KH liên hệ</a>
              <a onclick="taofile('sitemap')" class="dropdown-item"><i class="icon-clipboard2"></i> Tạo sitemap</a>
              <a href="../"  target="_blank" class="dropdown-item"><i class="icon-calendar5"></i> Xem website</a>
              <div class="dropdown-divider"></div>
              <a href="index.php?com=user&act=logout" class="dropdown-item"><i class="icon-power3"></i> Đăng xuất</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<script type="text/javascript">
    function taofile(filename) {
        $.ajax({
            type: "POST",
            url: "ajax/xulysitemap.php",
            data: {act: filename},
            success: function (data) {
                alert('Tạo SiteMap Thành Công');
            }
        })
    }
</script>
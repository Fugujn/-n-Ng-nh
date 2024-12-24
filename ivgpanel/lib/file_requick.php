<?php

$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$d = new database($config['database']);

$d->reset();
$sql_setting = "select * from #_setting limit 0,1";
$d->query($sql_setting);
$row_setting = $d->fetch_array();

$d->query("select * from #_photo where type='photo'");
$row_photo = $d->fetch_array();

$alt = $row_setting['ten_vi'];

$title_custom = '';
$keywords_custom = '';
$description_custom = '';


$d->reset();
$sql = "select * from table_product where tenkhongdau='" . $com . "'";
$d->query($sql);
$tenkhongdau_product = $d->fetch_array();

$d->reset();
$sql = "select * from table_product_list where tenkhongdau='" . $com . "'";
$d->query($sql);
$tenkhongdau_product_l = $d->fetch_array();



if ($com == 'vi') {
    $_SESSION['language'] = "vi";
    header('Location:' . $_SERVER['HTTP_REFERER']);
} elseif ($com == 'en') {
    $_SESSION['language'] = "en";
    header('Location:' . $_SERVER['HTTP_REFERER']);

} elseif ($com == 'index' || $com == '') {
    $image_share = 'http://' . $config_url .'/'. _upload_hinhanh_l . $row_photo["logo"];
    //$source = "index";
    //$template = "index";
/*} elseif ($com == 'login') {
    // $source = "login";
    $template = "login";
    $breakcrumb = "<i class='fa fa-home' style='margin-right:5px;color:#ababab'></i><a style='color:#6B6B6B' href='./'>Trang chủ </a> <span style='padding:0px 5px'><i class='fa fa-angle-right'></i></span> <a style='color:#ababab'>Đăng nhập</a>";
} elseif ($com == 'user') {
    $source = "user";
    $breakcrumb = "<i class='fa fa-home' style='margin-right:5px;color:#ababab'></i><a style='color:#6B6B6B' href='./'>Trang chủ </a> <span style='padding:0px 5px'><i class='fa fa-angle-right'></i></span> <a style='color:#ababab'>Tài khoản</a>";
} elseif ($com == 'logout') {
    unset($_SESSION['mem_login']['email']);
    unset($_SESSION['mem_login']['name']);
    unset($_SESSION['mem_login']['id']);
    unset($_SESSION['cart']);
    unset($_SESSION['idedit']);
    header('Location:./');*/
} elseif ($com == 'gioi-thieu') {
    $table = 'about';
    $type = "gioi-thieu";
    $title_bar = 'Giới thiệu - ';
    $title_tcat = 'Giới thiệu';
    $source = "about";
    $template = "about";
/*} elseif ($com == 'giao-hang-mien-phi') {
    $table = 'about';
    $type = "giao-hang";
    $title_bar = 'Giao hàng miễn phí - ';
    $title_tcat = 'Giao hàng miễn phí';
    $source = "about";
    $template = "about";*/
 
} elseif ($com == 'checkout') {
    $title_tcat = change_lang('Đơn hàng', 'Search');
    $title_bar = change_lang('Đơn hàng - ', 'Search - ');
    $breakcrumb = "<i class='fa fa-home' style='margin-right:5px;color:#fff'></i><a style='color:#fff' href='http://" . $config_url . "'>".change_lang('Trang chủ', 'Home')." </a> <span style='padding:0px 5px;color:#fff'><i class='fa fa-angle-right'></i></span> <a style='color:#fff'>".change_lang('Thanh toán thành công', 'Search')."</a>";
    $source = "checkout";
    $template = "checkout";

} elseif ($com == 'san-pham') {
    $type = "san-pham";
    $title_tcat = 'Sản phẩm';
    $title_bar = 'Sản phẩm - ';
    $source = "product";
    $template = "product";
} elseif ($com == 'dich-vu') {
    $type = "news";
    $source = "product";
    $template = "news";

} elseif ($com == 'thong-tin-tuyen-dung') {
    $type = "tuyendung";
    $source = "product";
    $template = "news";


/*} elseif ($com == 'bao-gia') {
    $type = "baogia";
    $source = "product";
    $template = "news";
} elseif ($com == 'khuyen-mai') {
    $type = "sales";
    $source = "product";
    $template = "news";*/
} elseif ($com == 'chinh-sach') {
    $type = "chinhsach";
    $source = "product";
    $template = "news";  
} elseif ($com == 'thong-tin') {
    $type = "news";
    $source = "product";
    $template = "news";
} elseif ($com == 'du-an-da-thi-cong') {
    $type = "thicong";
    $source = "product";
    $template = "news";
} elseif ($com == 'hoi-dap') {
    $type = "news";
    $source = "product";
    $template = "news";      
} elseif ($com == 'tim-kiem') {
    $title_tcat = change_lang('Tìm kiếm', 'Search');
    $title_bar = change_lang('Tìm kiếm - ', 'Search - ');
    $breakcrumb = "<i class='fa fa-home' style='margin-right:5px;color:#fff'></i><a style='color:#fff' href='http://" . $config_url . "'>".change_lang('Trang chủ', 'Home')." </a> <span style='padding:0px 5px;color:#fff'><i class='fa fa-angle-right'></i></span> <a style='color:#fff'>".change_lang('Tìm kiếm', 'Search')."</a>";
    $source = "search";
    $template = "search";
} elseif ($com == 'lien-he') {
    $type = "lien-he";
    $title_tcat = change_lang('Liên hệ', 'Contact');
    $title_bar = change_lang('Liên hệ - ', 'Contact - ');
    $breakcrumb = "<i class='fa fa-home' style='margin-right:5px;color:#fff'></i><a style='color:#fff' href='http://" . $config_url . "'>".change_lang('Trang chủ', 'Home')." </a> <span style='padding:0px 5px;color:#fff'><i class='fa fa-angle-right'></i></span> <a style='color:#fff'>".change_lang('Liên hệ', 'Contact')."</a>";
    $source = "contact";
    $template = "contact";
} elseif ($com == 'gio-hang' || $com == 'search-check') {
    //$title_tcat = change_lang('Giỏ hàng', 'Cart');
    //$title_bar = change_lang('Giỏ hàng - ', 'Cart- ');
    //$breakcrumb = "<i class='fa fa-home' style='margin-right:5px;color:#fff'></i><a style='color:#fff' href='http://" . $config_url . "'>Trang chủ </a> <span style='padding:0px 5px;color:#fff'><i class='fa fa-angle-right'></i></span> <a style='color:#fff'>Giỏ hàng</a>";
    $source = "giohang";
    $template = "giohang";
} elseif ($com == 'thanh-toan') {
    $title_tcat = 'Thanh toán';
    $title_bar = 'Thanh toán - ';
    $breakcrumb = "<i class='fa fa-home' style='margin-right:5px;color:#fff'></i><a style='color:#fff' href='http://" . $config_url . "'>Trang chủ </a> <span style='padding:0px 5px;color:#fff'><i class='fa fa-angle-right'></i></span> <a style='color:#fff'>Thanh toán</a>";
    $source = "thanhtoan";
    $template = "thanhtoan";
/*} elseif ($com == 'hot-product') {
    $type = "san-pham";
    $title_tcat = 'Hot product';
    $title_bar = 'Hot product - ';
    $source = "product";
    $template = "product";*/
} elseif ($com == 'san-pham-noi-bat') {
    $type = "san-pham";
    $title_tcat = 'Sản phẩm nổi bật';
    $title_bar = 'Sản phẩm nổi bật - ';
    $source = "product";
    $template = "product";
} elseif ($com == 'san-pham-moi') {
    $type = "san-pham";
    $title_tcat = 'Sản phẩm mới';
    $title_bar = 'Sản phẩm mới - ';
    $source = "product";
    $template = "product";

} elseif ($com == 'thoat') {
    logout();
} elseif ($tenkhongdau_product['tenkhongdau'] != '') {
    $tenkhongdau_p = $tenkhongdau_product['tenkhongdau'];
    $type = $tenkhongdau_product['type'];
    if($type == 'san-pham'){
      $source = "product";
      $template = "product_detail";
    }
    if($type == 'news'){
      $title_tcat = "Thông tin";  
      $source = "product";
      $template = "news_detail";
    }
    if($type == 'duongdan'){
      $title_tcat = "Hướng dẫn mua hàng";  
      $source = "product";
      $template = "news_detail";
    }
    if($type == 'thicong'){
      $title_tcat = "Thông tin tuyển dụng";  
      $source = "product";
      $template = "news_detail";
    }
    if($type == 'dich-vu'){
      $title_tcat = "Dịch vụ";  
      $source = "product";
      $template = "news_detail";
    }
    if($type == 'baogia'){
      $title_tcat = "Báo giá";  
      $source = "product";
      $template = "news_detail";
    }
    if($type == 'goctuvan'){
      $title_tcat = "Góc tư vấn";  
      $source = "product";
      $template = "news_detail";
    }
    if($type == 'tuyendung'){
      $title_tcat = "Thông tin tuyển dụng";  
      $source = "product";
      $template = "news_detail";
    }

    if($type == 'sales'){
      $title_tcat = "Khuyến mãi";  
      $source = "product";
      $template = "news_detail";
    }
    if($type == 'chinhsach'){
      $title_tcat = "Chính sách";  
      $source = "product";
      $template = "news_detail";
    }
    
} elseif ($tenkhongdau_product_l['tenkhongdau'] != '') {
    $tenkhongdau = $tenkhongdau_product_l['tenkhongdau'];
    $type = $tenkhongdau_product_l['type'];
    if($type == 'san-pham'){
      $source = "product";
      $template = "product";
    }else{
      $source = "product";
      $template = "news";
    }
    
} else {
    redirect("404.htm");
}


if ($source != "")
    include _source . $source . ".php";

if ($_REQUEST['com'] == 'logout') {
    session_unregister($login_name);
    header("Location:index.php");
}
?>
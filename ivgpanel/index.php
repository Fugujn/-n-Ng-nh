<?php
session_start();
@define('_template', './templates/');
@define('_source', './sources/');
@define('_lib', './lib/');
error_reporting(0);
include_once _lib . "config.php";
include_once _lib . "constant.php";
include_once _lib . "functions.php";
include_once _lib . "functions_giohang.php";
include_once _lib . "class.database.php";

$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";


$d = new database($config['database']);

$d->reset();
$sql_setting = "select * from #_setting limit 0,1";
$d->query($sql_setting);
$row_setting = $d->fetch_array();
/*---------------SET LEVEL CAT----------------------*/
$level = 2;
$level1 = 1;
/*----------------END LEVEL CAT---------------------*/
switch ($com) {
    case 'vi':
        $_SESSION['ad_language'] = "vi";
        //header('Location:index.php?com=user&act=login');
        redirect("".$_SERVER['HTTP_REFERER']."");
    case 'en':
        $_SESSION['ad_language'] = "en";
        //header('Location:index.php?com=user&act=login'); 
        redirect("".$_SERVER['HTTP_REFERER']."");
    case 'product':
        $source = "product";
        break;
    case 'user':
        $source = "user";
        break;
    case 'dknhantin':
        $source = "dknhantin";
        break;
    case 'setting':
        $source = "setting";
        break;
    case 'footer':
        $source = "footer";
        break;
    case 'lienhe':
        $source = "lienhe";
        break;
    case 'order':
        $source = "donhang";
        break;
    case 'bannerqc':
        $source = "bannerqc";
        break;
    case 'icon':
        $source = "icon";
        break;
    case 'time':
        $source = "time";
        break;
    case 'thanhvien':
        $source = "thanhvien";
        break;   

    default:
        $source = "";
        $template = "index";
        break;
}



$lang = $_SESSION['ad_language'];
if($lang != ''){
    include _source ."adminlang_".$lang.".php";
    
}else{
    include _source ."adminlang_vi.php";
    
}
$lang = 'vi';
if ((!isset($_SESSION[$login_name]) || $_SESSION[$login_name] == false) && $act != "login") {
    redirect("index.php?com=user&act=login");
}

if ($source != "")
    include _source . $source . ".php";

$d->reset();
$sql_setting = "select * from #_setting limit 0,1";
$d->query($sql_setting);
$row_setting = $d->fetch_array();

$d->reset();
$d->query("select * from #_photo where type='photo'");
$row_photo = $d->fetch_array();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html4/DTD/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="admin">
    <meta name="keywords" content="admin">
    <meta name="author" content="IVG WEB">
    <title>Administrator - IVG WEB</title>
   
    <link rel="shortcut icon" type="image/x-icon" href="media/images/logo.png">
    <link rel="shortcut icon" type="image/png" href="media/images/logo.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/icomoon.css">
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/pace.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END Custom CSS-->
</head>

<style type="text/css" media="screen">
    .content-wrapper{min-height: 550px;}
</style>

<?php if (isset($_SESSION[$login_name]) && ($_SESSION[$login_name] == true)) { ?> 
<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">   
    <?php include _template . "menu_tpl.php"; ?>
    <?php include _template . "header_tpl.php" ?>
    <div class="app-content content container-fluid">
          <div class="content-wrapper">
           <!--  <div class="content-header row"></div> -->
            <div class="content-body"><!-- stats -->
             
            <?php include _template . $template . "_tpl.php" ?>
        				
            </div>
        </div>
    </div>
    <?php include _template . "footer_tpl.php" ?>
<!-- ////////////////////////////////////////////////////////////////////////////-->
</body>
	<?php } else { ?> 
<body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">  
	<?php include _template . $template . "_tpl.php" ?>
</body>
	<?php } ?>



<!-- BEGIN VENDOR JS-->
    <script src="app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
    <script src="app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/ui/unison.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/extensions/pace.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="app-assets/vendors/js/charts/chart.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="app-assets/js/core/app.js" type="text/javascript"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="app-assets/js/scripts/pages/dashboard-lite.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
     <!-- BEGIN PAGE LEVEL JS-->
    <!-- <script src="app-assets/js/scripts/charts/chartjs/bar/bar.js" type="text/javascript"></script> -->
    <link rel="stylesheet" type="text/css" href="media/dropzone/dropzone.css">
    <script type="text/javascript" src="media/dropzone/dropzone.js"></script>
    <script type="text/javascript" src="ckfinder/ckfinder.js" charset="utf-8"></script>
    <script type="text/javascript" src="ckeditor/ckeditor.js" charset="utf-8"></script>
    

    <script type="text/javascript">
        $(document).ready(function(){

            $(".editor").each(function(){
                $id=$(this).attr("id");


                var editor = CKEDITOR.replace(''+$id, {
              
                uiColor: '#EAEAEA',
                language: 'vi',
                
                width: '100%',
                resize_enabled: false,
                removePlugins : 'spellchecker,maximize,newpage,pagebreak,pastetext,preview,print,templates,clipboard,language,smiley,specialchar,stylescombo,find,fakeobjects,flash,floatingspace,listblock,richcombo,a11yhelp,about,bidi,forms,horizontalrule,htmlwriter,indent,div,showblocks,selectall,copyformatting,dialogui,dialog,toolgroup,undo,scayt,wsc',
                removeButtons : 'Cut,Paste,Copy,scayt',
                //removePlugins: 'resize',
                //removePlugins : 'elementspath',
                qtRows: 20, // Count of rows
                qtColumns: 20, // Count of columns
                qtBorder: '1', // Border of inserted table
                qtWidth: '90%', // Width of inserted table
                qtStyle: { 'border-collapse' : 'collapse' },
                qtStyle: { 'padding' : '20px' },
                height: 450,
                filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
                filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
                filebrowserLinkBrowseUrl:  'ckfinder/ckfinder.html',
                filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                filebrowserLinkUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload',
        
            });
        })
            
    })
       
    </script>
 
   
    <?php include "media/scripts/my_script.php" ?>
    <?php include "media/scripts/my_chart.php" ?>
    <!-- END PAGE LEVEL JS-->
    <!-- <script src="media/scripts/my_script.js" type="text/javascript"></script> -->




</html>
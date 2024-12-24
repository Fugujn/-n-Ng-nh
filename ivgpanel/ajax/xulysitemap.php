<?php
session_start();
@define('_template', '../templates/');
@define('_source', '../sources/');
@define('_lib', '../lib/');
error_reporting(0);
include_once _lib . "config.php";
include_once _lib . "constant.php";
include_once _lib . "functions.php";
include_once _lib . "library.php";
include_once _lib . "class.database.php";

$d = new database($config['database']);
$act=$_REQUEST['act'];
//dump($_POST);
switch ($act){
	case 'sitemap':
		update_sitemap();
		break;
	case 'rss':
		update_rss();
		break;
	
}

function update_sitemap(){
		global $d,$config_url;
		$d->reset();
		$sql="select * from #_product where hienthi = 1 and type <> 'hoidap' and type <> 'chinhsach'  order by stt,id desc";
		$d->query($sql);
		$result=$d->result_array();

		$d->reset();
		$sql="select * from #_product_list where hienthi = 1 and com = 1 order by stt,id desc";
		$d->query($sql);
		$result_c1=$d->result_array();

		$d->reset();
		$sql="select * from #_product_list where hienthi = 1 and com = 2 order by stt,id desc";
		$d->query($sql);
		$result_c2=$d->result_array();

		/*$d->reset();
		$sql="select * from #_product_list where hienthi = 1 and com = 3 order by stt,id desc";
		$d->query($sql);
		$result_c3=$d->result_array();*/

		/*$d->reset();
		$sql="select * from #_product where hienthi = 1 and type = 'news' order by stt,id desc";
		$d->query($sql);
		$result1=$d->result_array();

		$d->reset();
		$sql="select * from #_product_list where hienthi = 1 and com = 1 and type = 'news' order by stt,id desc";
		$d->query($sql);
		$result1_c1=$d->result_array();

		$d->reset();
		$sql="select * from #_product where hienthi = 1 and type = 'bangmau' order by stt,id desc";
		$d->query($sql);
		$result2=$d->result_array();

		$d->reset();
		$sql="select * from #_product_list where hienthi = 1 and com = 1 and type = 'bangmau' order by stt,id desc";
		$d->query($sql);
		$result2_c1=$d->result_array();

		$d->reset();
		$sql="select * from #_product where hienthi = 1 and type = 'dichvu' order by stt,id desc";
		$d->query($sql);
		$result3=$d->result_array();

		$d->reset();
		$sql="select * from #_product_list where hienthi = 1 and com = 1 and type = 'dichvu' order by stt,id desc";
		$d->query($sql);
		$result3_c1=$d->result_array();*/

		/*$d->reset();
		$sql="select * from #_product where hienthi = 1 and type = 'goctuvan' order by stt,id desc";
		$d->query($sql);
		$result4=$d->result_array();*/

		/*$d->reset();
		$sql="select * from #_product_list where hienthi = 1 and com = 1 and type = 'goctuvan' order by stt,id desc";
		$d->query($sql);
		$result4_c1=$d->result_array();*/


		/*$d->reset();
		$sql="select * from #_product where hienthi = 1 and type = 'sales' order by stt,id desc";
		$d->query($sql);
		$result5=$d->result_array();*/

		/*$d->reset();
		$sql="select * from #_product where hienthi = 1 and type = 'chinhsach' order by stt,id desc";
		$d->query($sql);
		$result6=$d->result_array();*/

		/*$d->reset();
		$sql="select * from #_product where hienthi = 1 and type = 'baogia' order by stt,id desc";
		$d->query($sql);
		$result7=$d->result_array();*/

		

		$fp=fopen("../../sitemap.xml","w+")or exit("Không tìm thấy file");
$news='<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';

$news .='
<url>
  <loc>http://'.$config_url.'</loc>
  <changefreq>daily</changefreq>
  <priority>1.00</priority>
</url>';
$news .='
<url>
  <loc>http://'.$config_url.'/gioi-thieu.html</loc>
  <changefreq>daily</changefreq>
  <priority>1.00</priority>
</url>';
/*$news .='
<url>
  <loc>http://'.$config_url.'/giao-hang-mien-phi.html</loc>
  <changefreq>daily</changefreq>
  <priority>1.00</priority>
</url>';*/

$news .='
<url>
  <loc>http://'.$config_url.'/tin-tuc.html</loc>
  <changefreq>daily</changefreq>
  <priority>1.00</priority>
</url>';

$news .='
<url>
  <loc>http://'.$config_url.'/san-pham.html</loc>
  <changefreq>daily</changefreq>
  <priority>1.00</priority>
</url>';
$news .='
<url>
  <loc>http://'.$config_url.'/dich-vu.html</loc>
  <changefreq>daily</changefreq>
  <priority>1.00</priority>
</url>';
$news .='
<url>
  <loc>http://'.$config_url.'/du-an-da-thi-cong.html</loc>
  <changefreq>daily</changefreq>
  <priority>1.00</priority>
</url>';
$news .='
<url>
  <loc>http://'.$config_url.'/lien-he.html</loc>
  <changefreq>daily</changefreq>
  <priority>1.00</priority>
</url>';

foreach ($result as $kp => $vp) {
	$news .='
<url>
  <loc>http://'.$config_url.'/'.$vp["tenkhongdau"].'</loc>
  <changefreq>daily</changefreq>
  <priority>1.00</priority>
</url>';
}
foreach ($result_c1 as $kp => $vp) {
	$news .='
<url>
  <loc>http://'.$config_url.'/'.$vp["tenkhongdau"].'</loc>
  <changefreq>daily</changefreq>
  <priority>1.00</priority>
</url>';
}
foreach ($result_c2 as $kp => $vp) {
	$news .='<url>
  <loc>http://'.$config_url.'/'.$vp["tenkhongdau"].'</loc>
  <changefreq>daily</changefreq>
  <priority>1.00</priority>
</url>';
}
/*foreach ($result_c3 as $kp => $vp) {
	$news .='<url>
  <loc>http://'.$config_url.'/'.$vp["tenkhongdau"].'</loc>
  <changefreq>daily</changefreq>
  <priority>1.00</priority>
</url>';
}
*/
/*foreach ($result1 as $kp => $vp) {
	$news .='
<url>
  <loc>http://'.$config_url.'/'.$vp["tenkhongdau"].'</loc>
  <changefreq>daily</changefreq>
  <priority>1.00</priority>
</url>';
}
foreach ($result1_c1 as $kp => $vp) {
	$news .='
<url>
  <loc>http://'.$config_url.'/'.$vp["tenkhongdau"].'</loc>
  <changefreq>daily</changefreq>
  <priority>1.00</priority>
</url>';
}*/
/*foreach ($result2 as $kp => $vp) {
	$news .='
<url>
  <loc>http://'.$config_url.'/'.$vp["tenkhongdau"].'</loc>
  <changefreq>daily</changefreq>
  <priority>1.00</priority>
</url>';
}
foreach ($result2_c1 as $kp => $vp) {
	$news .='
<url>
  <loc>http://'.$config_url.'/'.$vp["tenkhongdau"].'</loc>
  <changefreq>daily</changefreq>
  <priority>1.00</priority>
</url>';
}
foreach ($result3 as $kp => $vp) {
	$news .='
<url>
  <loc>http://'.$config_url.'/'.$vp["tenkhongdau"].'</loc>
  <changefreq>daily</changefreq>
  <priority>1.00</priority>
</url>';
}
foreach ($result3_c1 as $kp => $vp) {
	$news .='
<url>
  <loc>http://'.$config_url.'/'.$vp["tenkhongdau"].'</loc>
  <changefreq>daily</changefreq>
  <priority>1.00</priority>
</url>';
}*/
/*foreach ($result4 as $kp => $vp) {
	$news .='
<url>
  <loc>http://'.$config_url.'/'.$vp["tenkhongdau"].'</loc>
  <changefreq>daily</changefreq>
  <priority>1.00</priority>
</url>';
}*/
/*foreach ($result4_c1 as $kp => $vp) {
	$news .='
<url>
  <loc>http://'.$config_url.'/'.$vp["tenkhongdau"].'</loc>
  <changefreq>daily</changefreq>
  <priority>1.00</priority>
</url>';
}*/
/*foreach ($result5 as $kp => $vp) {
	$news .='
<url>
  <loc>http://'.$config_url.'/'.$vp["tenkhongdau"].'</loc>
  <changefreq>daily</changefreq>
  <priority>1.00</priority>
</url>';
}
*/
/*foreach ($result6 as $kp => $vp) {
	$news .='
<url>
  <loc>http://'.$config_url.'/'.$vp["tenkhongdau"].'</loc>
  <changefreq>daily</changefreq>
  <priority>1.00</priority>
</url>';
}*/

/*foreach ($result7 as $kp => $vp) {
	$news .='
<url>
  <loc>http://'.$config_url.'/'.$vp["tenkhongdau"].'</loc>
  <changefreq>daily</changefreq>
  <priority>1.00</priority>
</url>';
}*/

$news .='
</urlset>';

	    fwrite($fp,$news);
	    fclose($fp);
	}

function update_rss(){
	
	}

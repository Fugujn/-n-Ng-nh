<?php 
	$d->reset();
	$sql="select * from #_province order by provinceid";
	$d->query($sql);
	$rs_province=$d->result_array();
	
	$d->reset();
	$sql="select * from #_district where provinceid='".$province."' order by districtid";
	$d->query($sql);
	$rs_district=$d->result_array();
?>
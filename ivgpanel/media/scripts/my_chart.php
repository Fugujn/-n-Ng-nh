<?php 
if($_REQUEST['y'] != '' && $_REQUEST['m'] != ''){
    $yearc = $_REQUEST['y'];
    $monthc = $_REQUEST['m'];

    $d->reset();
    $sql = "select id from #_counter where thang = '".$monthc."' and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_onl_t1= $d->num_rows();

    $d->reset();
    $sql = "select id from #_dknhantin where thang = '".$monthc."' and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_cont_t1= $d->num_rows();

    $d->reset();
    $sql = "select id from #_product where type = 'san-pham' and thang = '".$monthc."' and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_pro_t1= $d->num_rows();

    $d->reset();
    $sql = "select id from #_donhang where thang = '".$monthc."' and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_order_t1= $d->num_rows();

    $re_onl = $rs_onl_t1;
    $re_cont = $rs_cont_t1;
    $re_pro = $rs_pro_t1;
    $re_order = $rs_order_t1;

}elseif($_REQUEST['y'] != '' && $_REQUEST['m'] == ''){
    $yearc = $_REQUEST['y'];

    $d->reset();
    $sql = "select id from #_counter where thang = 1 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_onl_t1= $d->num_rows();

    $d->reset();
    $sql = "select id from #_counter where thang = 2 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_onl_t2= $d->num_rows();

    $d->reset();
    $sql = "select id from #_counter where thang = 3 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_onl_t3= $d->num_rows();

    $d->reset();
    $sql = "select id from #_counter where thang = 4 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_onl_t4= $d->num_rows();

    $d->reset();
    $sql = "select id from #_counter where thang = 5 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_onl_t5= $d->num_rows();

    $d->reset();
    $sql = "select id from #_counter where thang = 6 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_onl_t6= $d->num_rows();

    $d->reset();
    $sql = "select id from #_counter where thang = 7 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_onl_t7= $d->num_rows();

    $d->reset();
    $sql = "select id from #_counter where thang = 8 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_onl_t8= $d->num_rows();

    $d->reset();
    $sql = "select id from #_counter where thang = 9 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_onl_t9= $d->num_rows();

    $d->reset();
    $sql = "select id from #_counter where thang = 10 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_onl_t10= $d->num_rows();

    $d->reset();
    $sql = "select id from #_counter where thang = 11 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_onl_t11= $d->num_rows();

    $d->reset();
    $sql = "select id from #_counter where thang = 12 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_onl_t12= $d->num_rows();

    $re_onl = $rs_onl_t1.','.$rs_onl_t2.','.$rs_onl_t3.','.$rs_onl_t4.','.$rs_onl_t5.','.$rs_onl_t6.','.$rs_onl_t7.','.$rs_onl_t8.','.$rs_onl_t9.','.$rs_onl_t10.','.$rs_onl_t11.','.$rs_onl_t12;

    $d->reset();
    $sql = "select id from #_dknhantin where thang = 1 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_cont_t1= $d->num_rows();

    $d->reset();
    $sql = "select id from #_dknhantin where thang = 2 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_cont_t2= $d->num_rows();

    $d->reset();
    $sql = "select id from #_dknhantin where thang = 3 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_cont_t3= $d->num_rows();

    $d->reset();
    $sql = "select id from #_dknhantin where thang = 4 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_cont_t4= $d->num_rows();

    $d->reset();
    $sql = "select id from #_dknhantin where thang = 5 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_cont_t5= $d->num_rows();

    $d->reset();
    $sql = "select id from #_dknhantin where thang = 6 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_cont_t6= $d->num_rows();

    $d->reset();
    $sql = "select id from #_dknhantin where thang = 7 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_cont_t7= $d->num_rows();

    $d->reset();
    $sql = "select id from #_dknhantin where thang = 8 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_cont_t8= $d->num_rows();

    $d->reset();
    $sql = "select id from #_dknhantin where thang = 9 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_cont_t9= $d->num_rows();

    $d->reset();
    $sql = "select id from #_dknhantin where thang = 10 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_cont_t10= $d->num_rows();

    $d->reset();
    $sql = "select id from #_dknhantin where thang = 11 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_cont_t11= $d->num_rows();

    $d->reset();
    $sql = "select id from #_dknhantin where thang = 12 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_cont_t12= $d->num_rows();

    $re_cont = $rs_cont_t1.','.$rs_cont_t2.','.$rs_cont_t3.','.$rs_cont_t4.','.$rs_cont_t5.','.$rs_cont_t6.','.$rs_cont_t7.','.$rs_cont_t8.','.$rs_cont_t9.','.$rs_cont_t10.','.$rs_cont_t11.','.$rs_cont_t12;

    $d->reset();
    $sql = "select id from #_product where type = 'san-pham' and thang = 1 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_pro_t1= $d->num_rows();

    $d->reset();
    $sql = "select id from #_product where type = 'san-pham' and thang = 2 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_pro_t2= $d->num_rows();

    $d->reset();
    $sql = "select id from #_product where type = 'san-pham' and thang = 3 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_pro_t3= $d->num_rows();

    $d->reset();
    $sql = "select id from #_product where type = 'san-pham' and thang = 4 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_pro_t4= $d->num_rows();

    $d->reset();
    $sql = "select id from #_product where type = 'san-pham' and thang = 5 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_pro_t5= $d->num_rows();

    $d->reset();
    $sql = "select id from #_product where type = 'san-pham' and thang = 6 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_pro_t6= $d->num_rows();

    $d->reset();
    $sql = "select id from #_product where type = 'san-pham' and thang = 7 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_pro_t7= $d->num_rows();

    $d->reset();
    $sql = "select id from #_product where type = 'san-pham' and thang = 8 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_pro_t8= $d->num_rows();

    $d->reset();
    $sql = "select id from #_product where type = 'san-pham' and thang = 9 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_pro_t9= $d->num_rows();

    $d->reset();
    $sql = "select id from #_product where type = 'san-pham' and thang = 10 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_pro_t10= $d->num_rows();

    $d->reset();
    $sql = "select id from #_product where type = 'san-pham' and thang = 11 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_pro_t11= $d->num_rows();

    $d->reset();
    $sql = "select id from #_product where type = 'san-pham' and thang = 12 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_pro_t12= $d->num_rows();

    $re_pro = $rs_pro_t1.','.$rs_pro_t2.','.$rs_pro_t3.','.$rs_pro_t4.','.$rs_pro_t5.','.$rs_pro_t6.','.$rs_pro_t7.','.$rs_pro_t8.','.$rs_pro_t9.','.$rs_pro_t10.','.$rs_pro_t11.','.$rs_pro_t12;

    $d->reset();
    $sql = "select id from #_donhang where thang = 1 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_order_t1= $d->num_rows();

    $d->reset();
    $sql = "select id from #_donhang where thang = 2 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_order_t2= $d->num_rows();

    $d->reset();
    $sql = "select id from #_donhang where thang = 3 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_order_t3= $d->num_rows();

    $d->reset();
    $sql = "select id from #_donhang where thang = 4 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_order_t4= $d->num_rows();

    $d->reset();
    $sql = "select id from #_donhang where thang = 5 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_order_t5= $d->num_rows();

    $d->reset();
    $sql = "select id from #_donhang where thang = 6 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_order_t6= $d->num_rows();

    $d->reset();
    $sql = "select id from #_donhang where thang = 7 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_order_t7= $d->num_rows();

    $d->reset();
    $sql = "select id from #_donhang where thang = 8 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_order_t8= $d->num_rows();

    $d->reset();
    $sql = "select id from #_donhang where thang = 9 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_order_t9= $d->num_rows();

    $d->reset();
    $sql = "select id from #_donhang where thang = 10 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_order_t10= $d->num_rows();

    $d->reset();
    $sql = "select id from #_donhang where thang = 11 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_order_t11= $d->num_rows();

    $d->reset();
    $sql = "select id from #_donhang where thang = 12 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_order_t12= $d->num_rows();

    $re_order = $rs_order_t1.','.$rs_order_t2.','.$rs_order_t3.','.$rs_order_t4.','.$rs_order_t5.','.$rs_order_t6.','.$rs_order_t7.','.$rs_order_t8.','.$rs_order_t9.','.$rs_order_t10.','.$rs_order_t11.','.$rs_order_t12;

}else{
    $yearc = date('Y',time());
    $d->reset();
    $sql = "select id from #_counter where thang = 1 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_onl_t1= $d->num_rows();

    $d->reset();
    $sql = "select id from #_counter where thang = 2 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_onl_t2= $d->num_rows();

    $d->reset();
    $sql = "select id from #_counter where thang = 3 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_onl_t3= $d->num_rows();

    $d->reset();
    $sql = "select id from #_counter where thang = 4 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_onl_t4= $d->num_rows();

    $d->reset();
    $sql = "select id from #_counter where thang = 5 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_onl_t5= $d->num_rows();

    $d->reset();
    $sql = "select id from #_counter where thang = 6 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_onl_t6= $d->num_rows();

    $d->reset();
    $sql = "select id from #_counter where thang = 7 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_onl_t7= $d->num_rows();

    $d->reset();
    $sql = "select id from #_counter where thang = 8 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_onl_t8= $d->num_rows();

    $d->reset();
    $sql = "select id from #_counter where thang = 9 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_onl_t9= $d->num_rows();

    $d->reset();
    $sql = "select id from #_counter where thang = 10 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_onl_t10= $d->num_rows();

    $d->reset();
    $sql = "select id from #_counter where thang = 11 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_onl_t11= $d->num_rows();

    $d->reset();
    $sql = "select id from #_counter where thang = 12 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_onl_t12= $d->num_rows();

    $re_onl = $rs_onl_t1.','.$rs_onl_t2.','.$rs_onl_t3.','.$rs_onl_t4.','.$rs_onl_t5.','.$rs_onl_t6.','.$rs_onl_t7.','.$rs_onl_t8.','.$rs_onl_t9.','.$rs_onl_t10.','.$rs_onl_t11.','.$rs_onl_t12;

    $d->reset();
    $sql = "select id from #_dknhantin where thang = 1 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_cont_t1= $d->num_rows();

    $d->reset();
    $sql = "select id from #_dknhantin where thang = 2 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_cont_t2= $d->num_rows();

    $d->reset();
    $sql = "select id from #_dknhantin where thang = 3 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_cont_t3= $d->num_rows();

    $d->reset();
    $sql = "select id from #_dknhantin where thang = 4 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_cont_t4= $d->num_rows();

    $d->reset();
    $sql = "select id from #_dknhantin where thang = 5 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_cont_t5= $d->num_rows();

    $d->reset();
    $sql = "select id from #_dknhantin where thang = 6 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_cont_t6= $d->num_rows();

    $d->reset();
    $sql = "select id from #_dknhantin where thang = 7 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_cont_t7= $d->num_rows();

    $d->reset();
    $sql = "select id from #_dknhantin where thang = 8 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_cont_t8= $d->num_rows();

    $d->reset();
    $sql = "select id from #_dknhantin where thang = 9 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_cont_t9= $d->num_rows();

    $d->reset();
    $sql = "select id from #_dknhantin where thang = 10 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_cont_t10= $d->num_rows();

    $d->reset();
    $sql = "select id from #_dknhantin where thang = 11 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_cont_t11= $d->num_rows();

    $d->reset();
    $sql = "select id from #_dknhantin where thang = 12 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_cont_t12= $d->num_rows();

    $re_cont = $rs_cont_t1.','.$rs_cont_t2.','.$rs_cont_t3.','.$rs_cont_t4.','.$rs_cont_t5.','.$rs_cont_t6.','.$rs_cont_t7.','.$rs_cont_t8.','.$rs_cont_t9.','.$rs_cont_t10.','.$rs_cont_t11.','.$rs_cont_t12;

    $d->reset();
    $sql = "select id from #_product where type = 'san-pham' and thang = 1 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_pro_t1= $d->num_rows();

    $d->reset();
    $sql = "select id from #_product where type = 'san-pham' and thang = 2 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_pro_t2= $d->num_rows();

    $d->reset();
    $sql = "select id from #_product where type = 'san-pham' and thang = 3 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_pro_t3= $d->num_rows();

    $d->reset();
    $sql = "select id from #_product where type = 'san-pham' and thang = 4 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_pro_t4= $d->num_rows();

    $d->reset();
    $sql = "select id from #_product where type = 'san-pham' and thang = 5 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_pro_t5= $d->num_rows();

    $d->reset();
    $sql = "select id from #_product where type = 'san-pham' and thang = 6 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_pro_t6= $d->num_rows();

    $d->reset();
    $sql = "select id from #_product where type = 'san-pham' and thang = 7 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_pro_t7= $d->num_rows();

    $d->reset();
    $sql = "select id from #_product where type = 'san-pham' and thang = 8 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_pro_t8= $d->num_rows();

    $d->reset();
    $sql = "select id from #_product where type = 'san-pham' and thang = 9 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_pro_t9= $d->num_rows();

    $d->reset();
    $sql = "select id from #_product where type = 'san-pham' and thang = 10 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_pro_t10= $d->num_rows();

    $d->reset();
    $sql = "select id from #_product where type = 'san-pham' and thang = 11 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_pro_t11= $d->num_rows();

    $d->reset();
    $sql = "select id from #_product where type = 'san-pham' and thang = 12 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_pro_t12= $d->num_rows();

    $re_pro = $rs_pro_t1.','.$rs_pro_t2.','.$rs_pro_t3.','.$rs_pro_t4.','.$rs_pro_t5.','.$rs_pro_t6.','.$rs_pro_t7.','.$rs_pro_t8.','.$rs_pro_t9.','.$rs_pro_t10.','.$rs_pro_t11.','.$rs_pro_t12;

    $d->reset();
    $sql = "select id from #_donhang where thang = 1 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_order_t1= $d->num_rows();

    $d->reset();
    $sql = "select id from #_donhang where thang = 2 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_order_t2= $d->num_rows();

    $d->reset();
    $sql = "select id from #_donhang where thang = 3 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_order_t3= $d->num_rows();

    $d->reset();
    $sql = "select id from #_donhang where thang = 4 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_order_t4= $d->num_rows();

    $d->reset();
    $sql = "select id from #_donhang where thang = 5 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_order_t5= $d->num_rows();

    $d->reset();
    $sql = "select id from #_donhang where thang = 6 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_order_t6= $d->num_rows();

    $d->reset();
    $sql = "select id from #_donhang where thang = 7 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_order_t7= $d->num_rows();

    $d->reset();
    $sql = "select id from #_donhang where thang = 8 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_order_t8= $d->num_rows();

    $d->reset();
    $sql = "select id from #_donhang where thang = 9 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_order_t9= $d->num_rows();

    $d->reset();
    $sql = "select id from #_donhang where thang = 10 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_order_t10= $d->num_rows();

    $d->reset();
    $sql = "select id from #_donhang where thang = 11 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_order_t11= $d->num_rows();

    $d->reset();
    $sql = "select id from #_donhang where thang = 12 and nam = '".$yearc."' ";
    $d->query($sql);
    $rs_order_t12= $d->num_rows();

    $re_order = $rs_order_t1.','.$rs_order_t2.','.$rs_order_t3.','.$rs_order_t4.','.$rs_order_t5.','.$rs_order_t6.','.$rs_order_t7.','.$rs_order_t8.','.$rs_order_t9.','.$rs_order_t10.','.$rs_order_t11.','.$rs_order_t12;
}

?>

<script type="text/javascript">
  
$(window).on("load", function(){

    //Get the context of the Chart canvas element we want to select
    var ctx = $("#bar-chart");

    // Chart Options
    var chartOptions = {
        // Elements options apply to all of the options unless overridden in a dataset
        // In this case, we are setting the border of each horizontal bar to be 2px wide and green
        elements: {
            rectangle: {
                borderWidth: 2,
                borderColor: 'rgb(0, 255, 0)',
                borderSkipped: 'left'
            }
        },
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration:500,
        legend: {
            position: 'top',
        },
        scales: {
            xAxes: [{
                display: true,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: true,
                }
            }],
            yAxes: [{
                display: true,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: true,
                }
            }]
        },
        title: {
            display: false,
            text: 'Thống kê năm 2020'
        }
    };

    // Chart Data
    var chartData = {
        <?php if($_REQUEST['y'] != '' && $_REQUEST['m'] != ''){?>
        labels: ['Tháng <?=$_REQUEST['m']?>'],    
        <?php }elseif($_REQUEST['y'] != '' && $_REQUEST['m'] == ''){?>
        labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
        <?php }else{ ?>
        labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],   
        <?php } ?>    
        datasets: [{
            label: "Lượt truy cập",
            data: [<?=$re_onl?>],
            backgroundColor: "#08BED5",
            hoverBackgroundColor: "rgba(8,190,213,.9)",
            borderColor: "transparent"
        }, {
            label: "Lượt liên hệ",
            data: [<?=$re_cont?>],
            backgroundColor: "#E91E63",
            hoverBackgroundColor: "rgba(233,30,99,.9)",
            borderColor: "transparent"
        }, {
            label: "Sản phẩm",
            data: [<?=$re_pro?>],
            backgroundColor: "#DBBB59",
            hoverBackgroundColor: "rgba(219,187,89,.9)",
            borderColor: "transparent"
        }, {
            label: "Đơn hàng",
            data: [<?=$re_order?>],
            backgroundColor: "#FF5722",
            hoverBackgroundColor: "rgba(255,87,34,.9)",
            borderColor: "transparent"
        }]
    };

    var config = {
        type: 'horizontalBar',

        // Chart Options
        options : chartOptions,

        data : chartData
    };

    // Create the chart
    var lineChart = new Chart(ctx, config);
});
</script>
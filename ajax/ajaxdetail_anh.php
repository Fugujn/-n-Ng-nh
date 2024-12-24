<?php 
include ("configajax.php"); 
?>

<?php
$loc = $_POST['duan'];
?>
<script>
    $('#zoom_02').elevateZoom({
        zoomType: "inner",
        cursor: "crosshair",
        zoomWindowFadeIn: 1000,
        zoomWindowFadeOut: 1250
    });
</script>
<!-- <img id="zoom_02" src="<?= $loc ?>" data-zoom-image="<?= $loc ?>"> -->
<img src="<?= $loc ?>">
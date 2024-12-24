// JavaScript Document


function doEnter(evt) {
    // IE					// Netscape/Firefox/Opera
    var key;
    if (evt.keyCode == 13 || evt.which == 13) {
        onSearch(evt);
    }
}

function addtocart(id, $sl,$price) {
    $.ajax({
        type: 'post',
        url: "gio-hang.html",
        data: {id: id, sl: $sl, price: $price, act: 'add'},
        //dataType:'json',
        success: function (data) {
//            alert(data);
            $(".source-cart a").html(data.num);
            updateCartNum()
            //swal("Thông báo", "Thêm sản phẩm vào giỏ hàng thành công!", "success");
            $.fancybox({
                href: base_url + "/gio-hang/fill.html",
                type: "ajax"
            })
        }



    })
    
    return false;
}

function updateCartNum() {
    $.get("index.php", {ajax: "number"}, function (data) {

        $("#cart-total").html(data);
    })


}


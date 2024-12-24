<script type="text/javascript">
    // JavaScript Document
//  
//  
/*<! ------------Load album images------------ >*/ 
    $(document).ready(function () {
        $("#dZUpload").dropzone({
            url: "../../ajax/check.php",
            formName: "frm",
            addRemoveLinks: true,
            paramName: "xfile",
            success: function (file, response) {
                var imgName = response;
                file.previewElement.classList.add("dz-success");
                console.log(file);
            },
            error: function (file, response) {
                file.previewElement.classList.add("dz-error");
            }
        });
        /*$('.remove_image').click(function () {
            var id = $(this).data("id");
            $.ajax({
                type: "POST",
                url: "ajax/xuly_admin_dn.php", data: {id: id, act: 'remove_image'},
                success: function (data) {
                    $jdata = $.parseJSON(data);
                    $("#" + $jdata.md5).fadeOut(500);
                    setTimeout(function () {
                        $("#" + $jdata.md5).remove();
                    }, 1000)
                }
            })
        })*/
    })
/*<! ------------Load album images------------ >*/    
    
/*<! ------------Load show images------------- >*/    
    
    function loadFile(){
        var output = document.getElementById('imageview');
        $('#imageview').show();
        output.src = URL.createObjectURL(event.target.files[0]);
    }

    function loadFile_phu(){
        var output = document.getElementById('imageview_phu');
        $('#imageview_phu').show();
        output.src = URL.createObjectURL(event.target.files[0]);
    }

    function loadFile1(){
        var output = document.getElementById('imageview1');
        $('#imageview1').show();
        output.src = URL.createObjectURL(event.target.files[0]);
    }

    function loadFile2(){
        var output = document.getElementById('imageview2');
        $('#imageview2').show();
        output.src = URL.createObjectURL(event.target.files[0]);
    }

    function loadFile3(){
        var output = document.getElementById('imageview3');
        $('#imageview3').show();
        output.src = URL.createObjectURL(event.target.files[0]);
    }

    function loadFile4(){
        var output = document.getElementById('imageview4');
        $('#imageview4').show();
        output.src = URL.createObjectURL(event.target.files[0]);
    }

    function loadFile5(){
        var output = document.getElementById('imageview5');
        $('#imageview5').show();
        output.src = URL.createObjectURL(event.target.files[0]);
    }

    function loadFile6(){
        var output = document.getElementById('imageview6');
        $('#imageview6').show();
        output.src = URL.createObjectURL(event.target.files[0]);
    }

    function loadFile7(){
        var output = document.getElementById('imageview7');
        $('#imageview7').show();
        output.src = URL.createObjectURL(event.target.files[0]);
    }

    function loadFile8(){
        var output = document.getElementById('imageview8');
        $('#imageview8').show();
        output.src = URL.createObjectURL(event.target.files[0]);
    }

/*<! ------------Load show images------------- >*/

/*<! ------------Load remove & check------------- >*/
    $(document).ready(function() {
        $("#xoahet").click(function () {
            var listid = "";
            $("input[name='chon']").each(function () {
                if (this.checked)
                    listid = listid + "," + this.value;
            })
            listid = listid.substr(1);   //alert(listid);
            if (listid == "") {
                alert("Bạn chưa chọn mục nào");
                return false;
            }
            hoi = confirm("Bạn có chắc chắn muốn xóa?");
            if (hoi == true)
                document.location = "index.php?com=product&type=<?= $_REQUEST["type"] ?>&act=delete&listid=" + listid;
        });

        $("#xoahet_lhkh").click(function () {
            var listid = "";
            $("input[name='chon']").each(function () {
                if (this.checked)
                    listid = listid + "," + this.value;
            })
            listid = listid.substr(1);   //alert(listid);
            if (listid == "") {
                alert("Bạn chưa chọn mục nào");
                return false;
            }
            hoi = confirm("Bạn có chắc chắn muốn xóa?");
            if (hoi == true)
                document.location = "index.php?com=dknhantin&act=delete_cat&listid=" + listid;
        });

        $("#xoahet_icon").click(function () {
            var listid = "";
            $("input[name='chon']").each(function () {
                if (this.checked)
                    listid = listid + "," + this.value;
            })
            listid = listid.substr(1);   //alert(listid);
            if (listid == "") {
                alert("Bạn chưa chọn mục nào");
                return false;
            }
            hoi = confirm("Bạn có chắc chắn muốn xóa?");
            if (hoi == true)
                document.location = "index.php?com=icon&act=delete&type=<?= $_REQUEST["type"] ?>&listid=" + listid;
        });

    });
        $(document).ready(function() {
            $("#chonhet").click(function () {
                var status = this.checked;
                $("input[name='chon']").each(function () {
                    this.checked = status;
                })
            });
        });
/*<! ------------Load remove & check------------- >*/

/*<! ------------Load button status------------- >*/
        function initSwitch(com,table,id) {
        
            //alert(id);
            $.ajax({
                type: "POST",
                url: "ajax/xulysp.php",
                data: {id: id, act: "capnhat", fiel: com, table: table},
                success: function (data) {
                    $jdata = $.parseJSON(data);
                    if($jdata.sta=='1'){
                        $('#'+com+$jdata.idp).removeClass('btn-danger');
                        $('#'+com+$jdata.idp).addClass('btn-success');
                        document.getElementById(com+$jdata.idp).innerHTML = 'ON';
                    }else
                    if($jdata.sta=='0'){
                        $('#'+com+$jdata.idp).addClass('btn-danger');
                        $('#'+com+$jdata.idp).removeClass('btn-success');
                        document.getElementById(com+$jdata.idp).innerHTML = 'OFF';
                    }
                }
            })
            
        }
/*<! ------------Load button status------------- >*/

/*<! ------------Load level menu------------- >*/

$(document).ready(function () {
    load_level($(".level"));
    
    $(".level").change(function () {
        $id = $(this).val();
        
        if ($id != 0) {
            $.ajax({
                type: "POST",
                url: "ajax/ajax.php",
                data: {id: $id, act: "load_brand"},
                success: function (data) {
                    $("#thuonghieu").html(data);
                }
            })

            $.ajax({
                type: "POST",
                url: "ajax/ajax.php",
                data: {id: $id, act: "load_option_select", id_sp: "<?= ($_REQUEST["id"] != '') ? $_REQUEST["id"] : '0' ?>"},
                success: function (data) {
                    $("#option").html(data);
                    $(".option").click();
                }
            })
        }
    })
});

/*<! ------------Load level menu------------- >*/


/*<! ------------Load Price------------- >*/

$(document).on('keyup', '.gia', function() {
    var x = $(this).val();
    $(this).val(x.toString().replace(/,/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ","));
});
$(document).on('keyup', '.giakm', function() {
    var x = $(this).val();
    $(this).val(x.toString().replace(/,/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ","));
});

/*<! ------------Load Price------------- >*/


$(document).ready(function() {
    $('.ten').blur(function(e) {
        $('.tenkhongdau').val(locdau($(this).val()));
        $('.title').val($(this).val());
        $('.txt').val($(this).val());
    });
});

function locdau(str){
    str= str.toLowerCase();
    str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
    str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
    str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
    str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
    str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
    str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
    str= str.replace(/đ/g,"d");
    str= str.replace(/`|\||\–|-/g,"-");
    str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\ø|\φ|\]|~|$|_/g,"-");
    str= str.replace(/-+-/g,"-");
    str= str.replace(/^\-+|\-+$/g,"");  
    return str;
}



function isEmpty(el, text) {
    //var el = document.getElementById(id);
    var str = el.value;

    if (str != "")
        while (str.charAt(0) == " ")
            str = str.substr(1, str.length);

    //return str == "" ? true : false;
    if (str != "")
        return false;
    if (typeof (text) != 'undefined')
        alert(text);
    el.value = '';
    el.focus();
    return true;
}

function isNumber(el, text) {
    //var el = document.getElementById(id);
    var str = "0123456789";
    for (var j = 0; j < el.value.length; j++) {
        if (str.indexOf(el.value.charAt(j)) == -1) {
            if (typeof (text) != 'undefined')
                alert(text);
            el.value = '';
            el.focus();
            return false;
        }
    }
    return true;
}

function isPhone(el, text) {
    //var el = document.getElementById(id);
    var str = "0123456789. ()-";
    var result = true;
    for (var j = 0; j < el.value.length; j++) {
        if (str.indexOf(el.value.charAt(j)) == -1) {
            result = false;
            break;
        }
    }
    if (el.value.length < 7)
        result = false;
    if (!result) {
        el.focus();
        if (typeof (text) != 'undefined')
            alert(text);
    }
    return result;
}

function check_email(email)
{
    emailRegExp = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.([a-z]){2,4})$/;
    return emailRegExp.test(email);
}

function isEmail(el, text) {
    //var el = document.getElementById(id);
    emailRegExp = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.([a-z]){2,4})$/;
    if (!emailRegExp.test(el.value)) {
        if (typeof (text) != 'undefined')
            alert(text);
        el.focus();
        return false;
    }
    return true;
}

function isEmail_2(s) {
    if (s == "")
        return true;//false;
    if (s.indexOf(" ") > 0)
        return false;
    if (s.indexOf("@") == -1)
        return false;
    var i = 1;
    var sLength = s.length;
    if (s.indexOf(".") == -1)
        return false;
    if (s.indexOf("..") != -1)
        return false;
    if (s.indexOf("@") != s.lastIndexOf("@"))
        return false;
    if (s.lastIndexOf(".") == s.length - 1)
        return false;
    var str = "abcdefghikjlmnopqrstuvwxyz-@._";
    for (var j = 0; j < s.length; j++)
        if (str.indexOf(s.charAt(j)) == -1)
            return false;
    return true;
}

function compare(value_1, value_2) {
    if (value_1 < value_2)
        return -1;
    if (value_1 > value_2)
        return 1;
    return 0;
}
//---------------------------------------------------------
function create_option(index, value, text)
{
    var select = document.getElementsByTagName('select').item(index);
    option = document.createElement('option');
    option.value = value;
    option.innerHTML = text;
    select.appendChild(option);
}
//----------------------------------------------------- showtime
function showtime(id, lang) {
    var navName = navigator.appName;
    //alert("navName = "+navName);
    //var bVer = parseInt(navigator.appVersion);
    //alert("appVer = "+bVer);
    //return
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    var timeValue = ((hours > 12) ? hours - 12 : hours);
    timeValue += ((minutes < 10) ? ":0" : ":") + minutes;
    timeValue += ((seconds < 10) ? ":0" : ":") + seconds;
    timeValue += (hours >= 12) ? " PM, " : " AM, ";

    if (typeof (lang) != 'undefined' && lang == 'vi')
    {
        switch (now.getDay())
        {
            case 1 :
                timeValue += 'Chủ Nhật';
                break;
            case 2 :
                timeValue += 'Thứ Hai';
                break;
            case 3 :
                timeValue += 'Thứ Ba';
                break;
            case 4 :
                timeValue += 'Thứ Tư';
                break;
            case 5 :
                timeValue += 'Thứ Năm';
                break;
            case 6 :
                timeValue += 'Thứ Sáu';
                break;
            case 7 :
                timeValue += 'Thứ Bảy';
                break;
        }

        timeValue += ' &nbsp;' + now.getDate();
        if (now.getMonth() > 9)
            timeValue += ' - ' + now.getMonth();
        else
            timeValue += ' - 0' + now.getMonth();
        timeValue += ' - ' + (now.getYear() + 1900);

    } else
    {
        switch (now.getDay())
        {
            case 1 :
                timeValue += 'Sunday';
                break;
            case 2 :
                timeValue += 'Monday';
                break;
            case 3 :
                timeValue += 'Tuesday';
                break;
            case 4 :
                timeValue += 'Wednesday';
                break;
            case 5 :
                timeValue += 'Thursday';
                break;
            case 6 :
                timeValue += 'Friday';
                break;
            case 7 :
                timeValue += 'Saturday';
                break;
        }

        if (now.getMonth() > 9)
            timeValue += ' &nbsp;' + now.getMonth();
        else
            timeValue += ' &nbsp;0' + now.getMonth();
        timeValue += ' - ' + now.getDate();
        if (navName == 'Netscape')
            timeValue += ' - ' + (now.getYear() + 1900);
        else
            timeValue += ' - ' + (now.getYear());
    }

    document.getElementById(id).innerHTML = timeValue;
    timerID = setTimeout("showtime('" + id + "','" + lang + "')", 1000);
}
function makeid()
{
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for( var i=0; i < 5; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}
</script>
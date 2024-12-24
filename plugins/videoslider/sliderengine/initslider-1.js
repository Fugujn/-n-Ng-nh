jQuery(document).ready(function(){

    var scripts = document.getElementsByTagName("script");

    var jsFolder = "";

    for (var i= 0; i< scripts.length; i++)

    {

        if( scripts[i].src && scripts[i].src.match(/initslider-1\.js/i))

            jsFolder = scripts[i].src.substr(0, scripts[i].src.lastIndexOf("/") + 1);

    }

    jQuery("#amazingslider-1").amazingslider({

        sliderid:1,

        jsfolder:jsFolder,

        width:1070,

        height:550,

        skinsfoldername:"",

        loadimageondemand:false,

        videohidecontrols:false,

        donotresize:false,

        enabletouchswipe:true,

        fullscreen:false,

        autoplayvideo:false,

        addmargin:true,

        transitiononfirstslide:false,

        forceflash:false,

        isresponsive:true,

        forceflashonie11:true,

        forceflashonie10:true,

        pauseonmouseover:true,

        playvideoonclickthumb:true,

        slideinterval:5000,

        fullwidth:false,

        randomplay:false,

        scalemode:"fill",

        loop:0,

        autoplay:true,

        navplayvideoimage:"play-32-32-0.png",

        navpreviewheight:60,

        timerheight:2,

        descriptioncssresponsive:"font-size:12px;",

        shownumbering:false,

        skin:"RightTabsDark",

        addgooglefonts:true,

        navshowplaypause:true,

        navshowplayvideo:true,

        navshowplaypausestandalonemarginx:8,

        navshowplaypausestandalonemarginy:8,

        navbuttonradius:0,

        navthumbnavigationarrowimageheight:32,

        navmarginy:16,

        lightboxshownavigation:false,

        showshadow:false,

        navfeaturedarrowimagewidth:8,

        navpreviewwidth:120,

        googlefonts:"Inder",

        navborderhighlightcolor:"#fff",

        navcolor:"#999999",

        lightboxdescriptionbottomcss:"{color:#fff; font-size:12px; font-family:Arial,Helvetica,sans-serif; overflow:hidden; text-align:left; margin:4px 0px 0px; padding: 0px;}",

        lightboxthumbwidth:80,

        navthumbnavigationarrowimagewidth:32,

        navthumbtitlehovercss:"",

        navthumbmediumheight:64,

        texteffectresponsivesize:600,

        arrowwidth:32,

        texteffecteasing:"easeOutCubic",

        texteffect:"slide",

        lightboxthumbheight:60,

        navspacing:5,

        navarrowimage:"navarrows-28-28-0.png",

        bordercolor:"#ffffff",

        ribbonimage:"ribbon_topleft-0.png",

        navwidth:200,/*kichthuoc video*/

        navheight:115,

        arrowimage:"arrows-32-32-0.png",

        timeropacity:0.6,

        arrowhideonmouseleave:1000,

        navthumbnavigationarrowimage:"carouselarrows-32-32-4.png",

        navshowplaypausestandalone:false,

        texteffect1:"slide",

        navpreviewbordercolor:"#ffffff",

        texteffect2:"slide",

        customcss:"",

        ribbonposition:"topleft",

        navthumbdescriptioncss:"display:block;position:relative;padding:5px 10px;text-align:left;font:normal 13px opensans;color:#515151;",/*mota nav*/

        lightboxtitlebottomcss:"{color:#fff; font-size:14px; font-family:Armata,sans-serif,Arial; overflow:hidden; text-align:left;}",

        arrowstyle:"mouseover",

        navthumbmediumsize:800,

        navthumbtitleheight:18,

        textpositionmargintop:24,

        buttoncssresponsive:"",

        navswitchonmouseover:false,

        playvideoimage:"playvideo-64-64-0.png",

        arrowtop:50,

        textstyle:"static",

        playvideoimageheight:64,

        navfonthighlightcolor:"#666666",

        showbackgroundimage:false,

        navpreviewborder:4,

        navshowplaypausestandaloneheight:28,

        navdirection:"vertical",

        navbuttonshowbgimage:true,

        navbuttonbgimage:"navbuttonbgimage-28-28-0.png",

        textbgcss:"display:block; position:absolute; top:0px; left:0px; width:100%; height:100%; background-color:#ccc; opacity:0.6; filter:alpha(opacity=60);",/*bg title*/

        textpositiondynamic:"bottomleft",

        playvideoimagewidth:64,

        buttoncss:"display:block; position:relative; margin-top:8px;",

        navborder:0,

        navshowpreviewontouch:false,

        bottomshadowimagewidth:110,

        showtimer:true,

        navradius:0,

        navmultirows:false,

        navshowpreview:false,

        navpreviewarrowheight:8,

        navmarginx:20,

        navfeaturedarrowimage:"featuredarrow-8-16-2.png",

        navthumbsmallsize:480,

        showribbon:false,

        navstyle:"thumbnails",

        textpositionmarginleft:24,

        descriptioncss:"display:block; position:relative; font:14px opensans; color:#000; margin-top:8px;",/*mota nav lon*/

        navplaypauseimage:"navplaypause-28-28-0.png",

        backgroundimagetop:-10,

        timercolor:"#000",

        numberingformat:"%NUM/%TOTAL ",

        navthumbmediumwidth:64,

        navfontsize:12,

        navhighlightcolor:"#fff",

        texteffectdelay1:1000,

        navimage:"bullet-24-24-5.png",

        texteffectdelay2:1500,

        texteffectduration1:600,

        navshowplaypausestandaloneautohide:false,

        texteffectduration2:600,

        navbuttoncolor:"#999999",

        navshowarrow:true,

        texteffectslidedirection:"left",

        navshowfeaturedarrow:true,

        lightboxbarheight:64,

        titlecss:"display:block; position:relative; font-size:14px;font-family: montserratultralight; color:#000;",/*title nav lon*/

        ribbonimagey:0,

        ribbonimagex:0,

        navthumbsmallheight:48,

        texteffectslidedistance1:120,

        texteffectslidedistance2:120,

        navrowspacing:8,

        navshowplaypausestandaloneposition:"bottomright",

        shadowsize:5,

        lightboxthumbtopmargin:12,

        titlecssresponsive:"font-size:12px;",

        navshowplaypausestandalonewidth:28,

        navthumbresponsive:false,

        navfeaturedarrowimageheight:16,

        navopacity:1.0,

        textpositionmarginright:24,

        backgroundimagewidth:90,

        textautohide:true,

        navthumbtitlewidth:170, /*kichthuoc title nav con*/

        navpreviewposition:"top",

        texteffectseparate:false,

        arrowheight:32,

        shadowcolor:"#aaaaaa",

        arrowmargin:8,

        texteffectduration:600,

        bottomshadowimage:"bottomshadow-110-95-4.png",

        border:0,

        lightboxshowdescription:false,

        timerposition:"bottom",

        navfontcolor:"#fff",

        navthumbnavigationstyle:"arrowinside",

        borderradius:0,

        navbuttonhighlightcolor:"#fff",

        textpositionstatic:"bottom",

        texteffecteasing2:"easeOutCubic",

        navthumbstyle:"imageandtitledescription",

        texteffecteasing1:"easeOutCubic",

        textcss:"display:block; padding:12px; text-align:left;",

        navthumbsmallwidth:48,

        navbordercolor:"#fff",

        navpreviewarrowimage:"previewarrow-16-8-0.png",

        navthumbtitlecss:"display:block;position:relative;padding:5px 10px;text-align:left;font-size:14px montserratultralight;color:#000;",/*mau tieu de nav*/

        showbottomshadow:false,

        texteffectslidedistance:30,

        texteffectdelay:500,

        textpositionmarginstatic:0,

        backgroundimage:"",

        navposition:"right",

        texteffectslidedirection1:"right",

        navpreviewarrowwidth:16,

        textformat:"Bottom bar",

        texteffectslidedirection2:"right",

        bottomshadowimagetop:95,

        texteffectresponsive:true,

        navshowbuttons:false,

        lightboxthumbbottommargin:8,

        textpositionmarginbottom:24,

        lightboxshowtitle:true,

        slice: {

            duration:1500,

            easing:"easeOutCubic",

            checked:true,

            effects:"up,down,updown",

            slicecount:10

        },

        transition:"slice",

        scalemode:"fill",

        isfullscreen:false,

        textformat: {



        }

    });

});
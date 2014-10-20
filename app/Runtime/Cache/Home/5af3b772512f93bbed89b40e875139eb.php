<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title><?php echo ($title); ?></title>
        <meta name="keywords" content="<?php echo ($keyword); ?>"/>
        <meta name="description" content="<?php echo ($description); ?>"/>
        <meta name="viewport" content="width=device-width"/>
        <link rel="stylesheet" href="__S__/css/reset.css"/>
        <link rel="stylesheet" href="__S__/css/home/style.css"/>
        <!--[if lt IE 9]>
        <script type="text/javascript" src="__S__/js/jquery-1.10.2.min.js"></script>
        <![endif]-->
        <!--[if gte IE 9]>
        <!-->
        <script type="text/javascript" src="__S__/js/jquery-2.0.3.min.js"></script>
        <!--<![endif]-->
        <script type="text/javascript" src="__S__/js/jquery.cookie.js"></script>
        
    <!-- <link rel="stylesheet" href="__S__/js/jquery-ui/jquery-ui.css"/> -->
    <style>
        .m-phone {
            background: #fff;
            border-radius: 20px;
            border: 1px #999 solid;
            width: 500px;
            margin: 20px auto;
            box-shadow: 0 0px 1px #333;
        }
        .m-phone-head {
            height: 30px;
        }
        .m-phone-foot {
            padding: 10px;
        }
        .m-phone-body {
            margin: 0 5px;
            border: 1px #999 solid;
            background: #fff;
            height: 740px;
        }
        .layout{
            /*background: #f2f2f2;*/
            min-height: 20px;
        /*    margin-left: -20px;
            padding-left: 20px;*/
            /*padding-top: 15px;*/
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        .layout:hover{
            background: #f2f2f2;
        }
        .layout-row{
            clear:both;
            min-height: 20px;
        }
        .layout-col{
            float: left;
            border:1px #a2a2a2 dashed;
            min-height: 20px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        .component{
            border: 1px #f2f2f2 dashed;
            margin: 2px;
        }
        .component:hover{
            border: 1px #f2f2f2 solid;
        }
        .component-mask{
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 997;
            background: #333;
            filter:alpha(opacity=80);
            -moz-opacity:0.8;
            -khtml-opacity: 0.8;
            opacity: 0.8;
        }
        .m-phone-foot-add-layout{

        }
        .layout-pop-bar{
            position: absolute;
            display: none;
            border: 1px #f2f2f2 solid;
            background: #fff;
            box-shadow: 0 0 1px #333;
            padding: 5px;
            z-index: 998;
            height:18px;
            line-height:18px;
        }
        .component-pop-bar{
            position: absolute;
            display: none;
            border: 1px #f2f2f2 solid;
            background: #fff;
            box-shadow: 0 0 1px #333;
            padding: 5px;
            z-index: 998;
            height:18px;
            line-height:18px;
        }
    </style>

        
<script src="__S__/js/jquery-ui/jquery-ui.js" type="text/javascript" charset="utf-8"></script>
<script>
var $curr_layout;
var $curr_component;
function layout_bind(){
    $(".layout").unbind("mousemove").mousemove(function(event) {
        $(".layout-pop-bar").css({
            left: $(this).offset().left - $(".layout-pop-bar").outerWidth(),
            top: $(this).offset().top
        });
        $curr_layout = $(this);
        $(".layout-pop-bar").show();
    });
    $(".layout").unbind("mouseout").mouseout(function(event) {
        $(".layout-pop-bar").hide();
    });
    $(".layout-pop-bar").unbind("mouseover").mouseover(function(event) {
        $(this).show();
    });
    $(".layout-pop-bar-del").unbind("click").click(function(event) {
        if($curr_layout != null){
            $curr_layout.remove();
            $(".layout-pop-bar").hide();
            $(".component-pop-bar").hide();
        }
    });
}
function component_bind(){
    $(".component-pop-bar").unbind("mouseover").mouseover(function(event) {
        $(this).show();
    });

    $(".component").unbind("mousemove").mousemove(function(event) {
        /* Act on the event */
        $(".component-mask").animate({opacity:'0.8'},0);
        $(".component-pop-bar").hide();
        $curr_component = $(this);
        $(this).find(".component-mask").animate({opacity:'0.0'},0);
        $(".component-pop-bar").css({
            left: $(this).offset().left + $(this).outerWidth() - $(".component-pop-bar").outerWidth(),
            top: $(this).offset().top
        });
        $(".component-pop-bar").show();
    });
    // $(".component").unbind("mouseout").mouseout(function(event) {
    //     /* Act on the event */
    //     $(this).find(".component-mask").animate({opacity:'0.8'},0);
    // });
    $(".component-pop-bar-del").unbind("click").click(function(event) {
        if($curr_component != null){
            $curr_component.remove();
            $(".layout-pop-bar").hide();
            $(".component-pop-bar").hide();
        }
    });
    $(".component-pop-bar-set").unbind("click").click(function(event) {
        if($curr_component != null){
            open_dialog("/index/get_config_layout_list/call_back/append_layout", "选择布局", '80%', '350px');
            $(".layout-pop-bar").hide();
            $(".component-pop-bar").hide();
        }
    });

}
function sortable(){
    $(".m-phone-body").sortable().disableSelection();
    $(".layout-col").sortable({
        connectWith: ".layout-col"
    }).disableSelection();       
}
function append_layout($data){
    $(".m-phone-body").append($data);
    layout_bind();
    sortable();
}
function open_dialog($url, $title, $width, $height){
    if($("#layout_window").attr("src") != $url)
        $("#layout_window").attr("src", $url);
    $(".m-layer .u-tt").text($title);
    $(".m-layer .lywrap").css({width: $width});
    $(".m-layer .lyct").css({height: $height});
    $(".m-layer").show();
}
function close_dialog(){
    $(".m-layer").hide();
}
$(document).ready(function() {
    // window.open('/index/get_config_layout_list/call_back/append_layout', 'newwindow', 'height=100, width=400,top=0,left=0,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no, status=no');

    // window.showModalDialog("/index/get_config_layout_list/call_back/append_layout",null,"dialogWidth=800px;dialogHeight=100px");
    // $( ".draggable" ).draggable({ containment: ".draggable-box", scroll: false });
    $(".m-phone-foot-add-layout").click(function(event) {
        // window.open('/index/get_config_layout_list/call_back/append_layout', 'newwindow', 'height=100, width=400,top=0,left=0,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no, status=no');
        window.showModalDialog("/index/get_config_layout_list/call_back/append_layout", null,"dialogWidth=200px;dialogHeight=100px");
        // open_dialog("/index/get_config_layout_list/call_back/append_layout", "选择布局", '80%', '350px');
    });

    $(".lyclose").click(function(event) {
        $(".m-layer").hide();
    });

    $(".m-phone-body").mouseout(function(event) {
        $(".layout-pop-bar").hide();
        $(".component-pop-bar").hide();
    });
    layout_bind();
    component_bind();
    sortable();
    // $("#menu").menu();
    // $( "#selectmenu" ).selectmenu();
});

</script>

        <link rel="shortcut icon" href="/favicon.ico"/>
        <link rel="apple-touch-icon" href="/touchicon.png"/>
    </head>
    <body onselectstart="return false">
        <div class="g-head">
    <div class="m-head-line">

    </div>
    <div class="m-head-bar">
        <div class="g-page">
            <div class="m-head-log left">
                ddd
            </div>
            <div class="m-head-menu left">

            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
        
<div class="g-main">
    <div class="g-page">
        <div class="m-phone">
            <div class="m-phone-head"></div>
            <div class="m-phone-body">
                <div class="layout">
                    <div class="layout-row">
                        <div class="layout-col" style="width:33.333333%;">
							<div class="component on">
								<div style="position: relative;">
									<div class="component-mask">
										
									</div>
									<a href="" title="ddd">dddd</a>
									<a href="" title="ddd">dddd</a>
									<a href="" title="ddd">dddd</a>
									<a href="" title="ddd">dddd</a>
									<a href="" title="ddd">dddd</a>
									<a href="" title="ddd">dddd</a>
									<a href="" title="ddd">dddd</a>
									<a href="" title="ddd">dddd</a>
								</div>
							</div>
                        </div>
                        <div class="layout-col" style="width:33.333333%;">
                            <div class="component">
                                <div style="position: relative;">
                                    <div class="component-mask">
                                        
                                    </div>
                                    <a href="" title="ddd">dddd</a>
                                    <a href="" title="ddd">dddd</a>
                                    <a href="" title="ddd">dddd</a>
                                    <a href="" title="ddd">dddd</a>
                                    <a href="" title="ddd">dddd</a>
                                    <a href="" title="ddd">dddd</a>
                                    <a href="" title="ddd">dddd</a>
                                    <a href="" title="ddd">dddd</a>
                                </div>
                            </div>
                        </div>
                        <div class="layout-col" style="width:33.333333%;">
                            <div class="component">
                                <div style="position: relative;">
                                    <div class="component-mask">
                                        
                                    </div>
                                    <a href="" title="ddd">dddd</a>
                                    <a href="" title="ddd">dddd</a>
                                    <a href="" title="ddd">dddd</a>
                                    <a href="" title="ddd">dddd</a>
                                    <a href="" title="ddd">dddd</a>
                                    <a href="" title="ddd">dddd</a>
                                    <a href="" title="ddd">dddd</a>
                                    <a href="" title="ddd">dddd</a>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="layout">
                    <div class="layout-row">
                        <div class="layout-col" style="width:100%;">
                            
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="layout">
                    <div class="layout-row">
                        <div class="layout-col" style="width:100%;">
                            <div class="component">
                                <div style="position: relative;">
                                    <div class="component-mask">
                                        
                                    </div>
                                    <a href="" title="ddd">dddd</a><br>
                                    <a href="" title="ddd">dddd</a><br>
                                    <a href="" title="ddd">dddd</a><br>
                                    <a href="" title="ddd">dddd</a><br>
                                    <a href="" title="ddd">dddd</a><br>
                                    <a href="" title="ddd">dddd</a><br>
                                    <a href="" title="ddd">dddd</a><br>
                                </div>
                            </div>
                            <div class="component">
                                <div style="position: relative;">
                                    <div class="component-mask">
                                        
                                    </div>
                                    <a href="" title="ddd">dddd</a>
                                    <a href="" title="ddd">dddd</a>
                                    <a href="" title="ddd">dddd</a>
                                    <a href="" title="ddd">dddd</a>
                                    <a href="" title="ddd">dddd</a>
                                    <a href="" title="ddd">dddd</a>
                                    <a href="" title="ddd">dddd</a>
                                    <a href="" title="ddd">dddd</a>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="m-phone-foot">
                <div class="m-phone-foot-add-layout">
                    <img src="__S__/images/icon-add.png" alt="" class="u-icon">
                </div>
            </div>
            <a href="/index/get_config_layout_list/call_back/append_layout" title="" target="_blank">asdfas </a>
        </div>
    </div>
</div>
<div class="mymask"></div>
<div class="m-layer">
    <div class="lymask"></div>
    <table class="lytable"><tbody><tr><td class="lytd">
    <div class="lywrap">
        <div class="lytt"><h2 class="u-tt">标题</h2><span class="lyclose">×</span></div>
        <div class="lyct">
            <iframe src="about:blank" id="layout_window" style="border:0 none;width:100%;height:100%;"></iframe>
        </div>
        <div class="lybt">
            <div class="lyother">
                <p>其他信息，比如提示</p>
            </div>
            <!-- <div class="lybtns">
                <button type="button" class="u-btn">确定</button>
                <button type="button" class="u-btn u-btn-c4">取消</button>
            </div> -->
        </div>
    </div></td></tr></tbody></table>
</div>

<div class="layout-pop-bar" rel="0">
    <img src="__S__/images/icon-add.png" alt="" class="u-icon layout-pop-bar-add">
    <img src="__S__/images/icon-del.png" alt="" class="u-icon layout-pop-bar-del">
</div>
<div class="component-pop-bar" rel="0">
    <!-- <img src="__S__/images/icon-add.png" alt="" class="u-icon"> -->
    <img src="__S__/images/icon-del.png" alt="" class="u-icon component-pop-bar-del">
    <img src="__S__/images/icon-set.png" alt="" class="u-icon component-pop-bar-set">
</div>

        <div class="clear"></div>
        <div class="g-foot">
    <div class="g-page">
        <div class="m-copyright">
            <div class="left">感谢使用<a href="http://www.card7.net" target="_blank">APP定制平台</a></div>
            <div class="right">V1.0.131218</div>
            <div class="clear"></div>
        </div>
    </div>
</div>
    </body>
</html>
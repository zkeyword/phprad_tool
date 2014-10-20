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
	<!--<script type="text/javascript" src="__S__/js/json.js"></script>-->
	
    <style>
        *{
            background: transparent; 
        }
        .m-select-list li{
            border: 1px #f2f2f2 solid;
            margin-bottom: 10px;
            padding: 5px;
        }
    </style>

	
    <script>
        $(document).ready(function() {
            $(".select-btn").click(function(event) {
                // $(window.parent.document).<?php echo ($call_back); ?>($(this).next(".select-data").val());
                window.opener.<?php echo ($call_back); ?>($(this).next(".select-data").val());
                // window.opener.close_dialog();
                window.close();
            });
        });
    </script>

	<link rel="shortcut icon" href="/favicon.ico"/>
	<link rel="apple-touch-icon" href="/touchicon.png"/>	
</head>
<body onselectstart="return false">
	
<div class="g-main">
    <div class="g-page_2">
        <div class="m-select-list">
            <ul>
                <?php if(is_array($config_layout_list)): $i = 0; $__LIST__ = $config_layout_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$config_layout): $mod = ($i % 2 );++$i;?><li>
                    <span class="u-btn right select-btn">选择</span>
                    <textarea class="select-data" style="display:none;"><?php echo ($config_layout["html"]); ?></textarea>
                    <?php echo ($config_layout["name"]); ?>
                    <div class="clear"></div>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
</div>


</body>
</html>
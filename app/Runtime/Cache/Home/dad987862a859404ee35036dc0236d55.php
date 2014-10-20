<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>APP定制平台--ITZI</title>
	<meta name="keywords" content=""/>
	<meta name="description" content=""/>
	<meta name="viewport" content="width=device-width"/>
	<link rel="stylesheet" href="__S__/css/reset.css"/>
	<link rel="stylesheet" href="__S__/css/style_home.css"/>
	<!--[if lt IE 9]>
	<script type="text/javascript" src="__S__/js/jquery-1.10.2.min.js"></script>
	<![endif]-->
	<!--[if gte IE 9]>
	<!-->
	<script type="text/javascript" src="__S__/js/jquery-2.0.3.min.js"></script>
	<!--<![endif]-->
	<script type="text/javascript" src="__S__/js/jquery.cookie.js"></script>
	<!--<script type="text/javascript" src="__S__/js/json.js"></script>-->
	
	
	<link rel="shortcut icon" href="/favicon.ico"/>
	<link rel="apple-touch-icon" href="/touchicon.png"/>	
</head>
<body onselectstart="return false">
	
	<div id="main" class="g-main" style="margin-top:0;">
		<div class="row m-title">
			<h2>创建新日报</h2>
		</div>
		<div class="row">
			<form name="m-form" method="post" enctype="multipart/form-data">
					<fieldset>
						<div class="tab tab_1">
							<div class="formitm">
								<label class="lab">标题:</label>
								<div class="ipt">
									<input type="text" class="u-ipt" name="title" value=""/>
									<p></p>
								</div>
							</div>
							<div class="formitm">
								<label class="lab">内容：</label>
								<div class="ipt">
									<textarea class="u-ipt" style="width:400px;height:300px;" name="content"></textarea>
								</div>
							</div>

							<div class="formitm">
									<label class="lab">发送给:</label>
									<div class="ipt">
										<select class="u-select" name="user_id">
											<?php if(is_array($tolist)): $i = 0; $__LIST__ = $tolist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
										</select>
										<p></p>
									</div>
								</div>
						</div>
						<div class="formitm formitm-1">
							<button class="u-btn" type="submit">发送</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>

	<div class="clear"></div>
	<div class="g-footer">
	<div class="m-copyright">
        <div class="left">感谢使用<a href="http://www.card7.net" target="_blank">APP定制平台</a></div>
        <div class="right">V1.0.131218</div>
        <div class="clear"></div>
    </div>
</div>
</body>
</html>
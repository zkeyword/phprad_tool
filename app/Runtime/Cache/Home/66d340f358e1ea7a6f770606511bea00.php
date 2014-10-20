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
	
	
	<script>
		$(document).ready(function() {
			$(".m-hd li").click(function(event) {
				$(".tab").hide();
				$("."+$(this).attr("rel")).show();
				$(".m-hd li").removeClass('z-crt');
				$(this).addClass('z-crt');
			});
		});
	</script>

	<link rel="shortcut icon" href="/favicon.ico"/>
	<link rel="apple-touch-icon" href="/touchicon.png"/>	
</head>
<body onselectstart="return false">
	
	<link rel="stylesheet" href="/Static/kindeditor/default/default.css">
	<script charset="utf-8" src="/Static/kindeditor/kindeditor-min.js"></script>
	<script charset="utf-8" src="/Static/kindeditor/zh_CN.js"></script>
	<div id="main" class="g-main" style="margin-top:0;">
		<div class="row m-title">
			<h2>创建新任务</h2>
		</div>
		<div class="row">
			<div class="m-hd m-hd-bg">
				<h2 class="u-tt"></h2>
				<div class="more">
					<!-- <a href="#">更多&raquo;</a> -->
				</div>
				<ul>
					<li class="z-crt" rel="tab_1">
						<a href="#">基本</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="m-form">
				<form name="m-form" method="post" enctype="multipart/form-data">
					<fieldset>
						<div class="tab tab_1">
							<div class="formitm">
									<label class="lab">任务名:</label>
									<div class="ipt">
										<input type="text" class="u-ipt" name="name" value=""/>
										<input type="hidden" class="u-ipt" name="project_id" value="<?php echo ($project); ?>"/>
										<input type="hidden" class="u-ipt" name="project_flow_id" value="<?php echo ($taskpack); ?>"/>
										<input type="hidden" class="u-ipt" name="status" value="0"/>
										<p></p>
									</div>
								</div>
							<div class="formitm">
									<label class="lab">接收者:</label>
									<div class="ipt">
										<select class="u-select" name="employee_id">
											<?php if(is_array($next_task_user_list)): $i = 0; $__LIST__ = $next_task_user_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?>--<?php echo ($vo["job_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
										</select>
										<p></p>
									</div>
								</div>
							<div class="formitm">
									<label class="lab">预计完成时间:</label>
									<div class="ipt">
										<input type="text" class="u-ipt time" name="plan_complete_time" value="<?php echo date("Y-m-d h:i", time()); ?>"/>
										<p></p>
									</div>
								</div>
							<div class="formitm">
									<label class="lab">是否紧急:</label>
									<div class="ipt">
										<select class="u-select" name="important"><?php if(is_array($field_important)): $i = 0; $__LIST__ = $field_important;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" <?php if($key == "") echo "selected"; ?>><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
</select>
										<p></p>
									</div>
								</div>
							<div class="formitm">
									<label class="lab">描述:</label>
									<div class="ipt">
										<textarea class="u-textarea" name="remark"></textarea>
										<p></p>
									</div>
								</div>
						</div>
						<div class="formitm formitm-1">
							<button class="u-btn" type="submit">保存</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	<link href="/Static/css/datetimepicker.css" rel="stylesheet" type="text/css">
	<link href="/Static/css/dropdown.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="/Static/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="/Static/js/bootstrap-datetimepicker.zh-CN.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.time').datetimepicker({
				format: 'yyyy-mm-dd hh:ii',
				language:"zh-CN",
				minView:2,
				autoclose:true
			});
		});		
	</script>

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
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
			<h2>创建新项目</h2>
		</div>
		<!-- <div class="row">
			<a class="u-btn" href="<?php echo U('/Admin/Table/index/rid/'.$rid.'');?>">返回列表</a>
		</div> -->
		<div class="row">
			<div class="m-form">
				<form name="m-form" method="post" enctype="multipart/form-data">
					<fieldset>
						<div class="tab tab_1">
							<div class="formitm">
									<label class="lab">名称:</label>
									<div class="ipt">
										<input type="hidden" name="status" value="0"/>
										<input type="text" class="u-ipt" name="name" value=""/>
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
									<label class="lab">合同完成时间:</label>
									<div class="ipt">
										<input type="text" class="u-ipt time" name="contract_complete_time" value="<?php echo date("Y-m-d h:i", time()); ?>"/>
										<p></p>
									</div>
								</div>
							<div class="formitm">
									<label class="lab">客户:</label>
									<div class="ipt">
										<select class="u-select" name="customer_id">
											<?php if(is_array($field_customer_id)): $i = 0; $__LIST__ = $field_customer_id;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" <?php if($key == "") echo "selected"; ?>><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
											<option value="0">新增一个客户</option>
										</select>
										<p></p>
									</div>
								</div>
								<div class="formitm">
									<label class="lab">下一个流程处理人:</label>
									<div class="ipt">
										<select class="u-select" name="employee_id">
											<?php if(is_array($next_project_flow_user_info)): $i = 0; $__LIST__ = $next_project_flow_user_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?> - <?php echo ($vo["job_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
										</select>
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
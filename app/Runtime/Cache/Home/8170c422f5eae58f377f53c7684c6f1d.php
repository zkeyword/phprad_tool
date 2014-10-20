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
	
	<style>
		.lable{
			color: #000;
			font-weight: 800;
		}
		.desc{
			color: #ddd;
		}
		.log_blcok{
			margin-left: 20px;
		}
		.red{
			color: red;
			font-weight: 800;
		}
		.m-table tbody tr:hover{
			background: none;
		}
	</style>

	
	<link rel="shortcut icon" href="/favicon.ico"/>
	<link rel="apple-touch-icon" href="/touchicon.png"/>	
</head>
<body onselectstart="return false">
	
	<div id="main" class="g-main" style="margin-top:0;">
		<div class="row m-title">
			<span class="right"><span class="lable">状态&nbsp;:</span>&nbsp;<?php echo $project_field_status[$Project_info["status"]];?> &nbsp;&nbsp;&nbsp;&nbsp;<span class="lable">编号&nbsp;:</span>&nbsp;PRO<?php echo str_pad($Project_info["id"],8,"0",STR_PAD_LEFT); ?></span>
			<h2><?php echo ($Project_info["name"]); ?></h2>
		</div>
		<!-- <div class="row">
		<a class="u-btn" href="<?php echo U('/Admin/Table/index/rid/'.$rid.'');?>">返回列表</a>
	</div>
	-->
	<div class="row">

		<table class="m-table">
			<tbody>
				<tr>
					<td><span class="lable">创建时间&nbsp;:</span>&nbsp;<?php echo (date("Y-m-d",$Project_info["create_time"])); ?></td>
					<td><span class="lable">合同时间&nbsp;:</span>&nbsp;<?php echo (date("Y-m-d",$Project_info["contract_complete_time"])); ?></td>
					<td><span class="lable">计划完成时间&nbsp;:</span>&nbsp;<?php echo (date("Y-m-d",$Project_info["plan_complete_time"])); ?></td>
					<td><span class="lable">实际完成时间&nbsp;:</span>&nbsp;
						<?php
 if($Project_info["status"] == 99){ echo date("Y-m-d", $Project_info["complete_time"]); }else if($Project_info["status"] == -1){ echo "项目已关闭"; }else{ echo "进行中"; } ?>
					</td>
				</tr>
				<tr>
					<td><span class="lable">客户&nbsp;:</span>&nbsp;<?php echo ($Customer_info["name"]); ?></td>
					<td><span class="lable">联系人&nbsp;:</span>&nbsp;<?php echo ($Customer_info["contact"]); ?></td>
					<td><span class="lable">联系电话&nbsp;:</span>&nbsp;<?php echo ($Customer_info["phone"]); ?></td>
					<td><span class="lable">地址&nbsp;:</span>&nbsp;<?php echo ($Customer_info["address"]); ?></td>
				</tr>
				<tr style="background:#f2f2f2;">
					<td colspan="4"><span class="lable">流水明细&nbsp;</span></td>
				</tr>
				<tr>
					<td colspan="4">
						<?php if(is_array($Projectflowlog_list)): $i = 0; $__LIST__ = $Projectflowlog_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Projectflowlog): $mod = ($i % 2 );++$i;?><div><spann><?php echo (date("Y-m-d H:i:s",$Projectflowlog["create_time"])); ?></span>
								<?php  if(!empty($Projectflowlog["result"])){ echo $Projectflowlog["result"]; }else{ echo "<span class='red'>" .$Projectflowlog["name"]. "</span>"; } ?>
							</div><?php endforeach; endif; else: echo "" ;endif; ?>
					</td>
				</tr>
				<tr style="background:#f2f2f2;">
					<td colspan="4"><span class="lable">所有任务&nbsp;</span></td>
				</tr>
				<?php if(is_array($Task_list)): $i = 0; $__LIST__ = $Task_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Task): $mod = ($i % 2 );++$i;?><tr>
					<td colspan="4">
						<div>
							<?php  echo $Task["name"]; ?>
						</div>
						<div class="desc">
							<?php  echo $Task["remark"]; ?>
						</div>
						<?php if(is_array($Task["log"])): $i = 0; $__LIST__ = $Task["log"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$log): $mod = ($i % 2 );++$i;?><div class="log_blcok"><spann><?php echo (date("Y-m-d H:i:s",$log["create_time"])); ?></span>
								<?php
 if(!empty($log["result"])){ echo $log["result"]; }else{ echo "<span class='red'>" .$log["name"]. "</span>"; } ?>
							</div><?php endforeach; endif; else: echo "" ;endif; ?>
					</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>
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
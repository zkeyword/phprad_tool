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

	
	<style>
		.task_title{
			font-weight: 800;
		}
		.task_list{
			padding: 10px;
		}
		.task_list li{
			border: 1px #ddd solid;
			margin-bottom: 10px;
			padding: 5px;
			background: #fff;
		}	
		.task_list li:hover{
			background: #f2f2f2;
		}	
		.task_info{
			margin-left: 20px;
		}
	</style>

	
	<link rel="shortcut icon" href="/favicon.ico"/>
	<link rel="apple-touch-icon" href="/touchicon.png"/>	
</head>
<body onselectstart="return false">
	<div class="g-header">
	<div class="m-topaction">
		<div class="right" style="margin-right:10px;">
			<a href="<?php echo U('/Daily/add');?>?size=500*650" title="填写日报" target="_blank">填写日报</a>
			<a href="<?php echo U('/Project/add');?>?size=500*650" title="创建新项目" target="_blank">创建新项目</a>
		</div>
		<div class="clear"></div>
	</div>
	<div class="m-topmenu">
		<ul>
			<li><a href="<?php echo U('/');?>" title="待处理事务" <?php if (MODULE_NAME == 'Index' and ACTION_NAME == 'index') echo 'class="on"'; ?>>待处理事务</a></li>
			<!-- <li><a href="<?php echo U('/Task/index');?>" title="已完成任务" <?php if (MODULE_NAME == 'Task' and ACTION_NAME == 'index') echo 'class="on"'; ?>>已完成任务</a></li> -->
			<li><a href="<?php echo U('/Project');?>" <?php if(MODULE_NAME == 'Project' and ACTION_NAME == 'index') echo 'class="on"'; ?> title="发布项目">进行中项目</a></li>
			<li><a href="<?php echo U('/Project/complete');?>" <?php if (MODULE_NAME == 'Project' and ACTION_NAME == 'complete') echo 'class="on"'; ?> title="发布项目">已完成项目</a></li>
		</ul>
		<div class="clear"></div>
	</div>
	
</div>


	
	<div id="main" class="g-main">
		<div class="row">
			<div class="task_list">
				<ul>
					<?php if(is_array($Project_list)): $i = 0; $__LIST__ = $Project_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Project_info): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('/Project/view/id/'.$Project_info["id"]);?>?size=1000*600" title="<?php echo ($Project_info["name"]); ?>" target="_blank"><?php echo ($Project_info["name"]); ?> - <?php echo $field_project_status[$Project_info["status"]];?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
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
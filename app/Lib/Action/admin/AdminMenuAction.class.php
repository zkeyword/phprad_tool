<?php
// +----------------------------------------------------------------------
// | ITZI [ 让一切变得简单 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.itzi.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: wenliang <www.vvv@qq.com>
// +----------------------------------------------------------------------

class AdminMenuAction extends AdminAction {

	public function index(){
		$AdminMenu = D("AdminMenu");  // 实例化AdminMenu对象
		$list = tree_to_list2(list_to_tree($AdminMenu->select()));
		$this->assign('list',$list);                // 输出列表数据
		$this->assign('field_group_id',$AdminMenu->field_group_id);
		$this->assign("rurl", $_SERVER["REQUEST_URI"]);
		$this->display();

	}

	public function add(){
		$AdminMenu = D("AdminMenu"); // 实例化AdminMenu对象
		if(IS_POST){
			if (!$AdminMenu->create()){
				// 如果创建失败 表示验证没有通过 输出错误提示信息
				$this->error($AdminMenu->getError());
			}else{
				// 验证通过 可以进行其他数据操作
				$re = $AdminMenu->addAdminMenu();
				if ($re !== false) {
					$rurl = base64_decode($_GET["rurl"]);
					$rurl = empty($rurl)?"/admin/admin_menu":$rurl;
					$this->success('数据保存成功！', $rurl);
				} else {
					$this->error($AdminMenu->getError());
				}
			}
		}else{
			$this->assign('field_pid',$AdminMenu->field_pid);
			$this->assign('field_group_id',$AdminMenu->field_group_id);
			$this->display();
		}
	}

	public function edit(){
		$AdminMenu = D("AdminMenu"); // 实例化AdminMenu对象
		if(IS_POST){
			if (!$AdminMenu->create()){
				// 如果创建失败 表示验证没有通过 输出错误提示信息
				$this->error($AdminMenu->getError());
			}else{
				// 验证通过 可以进行其他数据操作
				$re = $AdminMenu->saveAdminMenu();
				if ($re !== false) {
					$rurl = base64_decode($_GET["rurl"]);
					$rurl = empty($rurl)?"/admin/admin_menu":$rurl;
					$this->success('数据保存成功！', $rurl);
				} else {
					$this->error($AdminMenu->getError());
				}
			}
		}else{
			$id = I("get.id","","trim,stripslashes,strip_tags,intval");
			$map["id"] = $id;
			$doc = $AdminMenu->where($map)->find();
			$this->assign('doc',$doc);
			$this->assign('field_pid',$AdminMenu->field_pid);
			$this->assign('field_group_id',$AdminMenu->field_group_id);
			$this->display();
			
		}
	}

	public function del(){
		$AdminMenu = D("AdminMenu"); // 实例化AdminMenu对象
		if(IS_POST){
			$id = I("get.id","","trim,stripslashes,strip_tags,intval");
			$map = array();
			$map["id"] = $id;
			$re = $AdminMenu->where($map)->deleteAdminMenu();
			if ($re !== false) {
				$rurl = base64_decode($_GET["rurl"]);
				$rurl = empty($rurl)?"/admin/admin_menu":$rurl;
				$this->success('数据删除成功！', $rurl);
			} else {
				$this->error($AdminMenu->getError());
			}
		}else{
			$id = I("get.id","","trim,stripslashes,strip_tags,intval");
			$this->assign('id',$id);
			$this->display();
		}
	}
}
?>
<?php
// +----------------------------------------------------------------------
// | ITZI [ 让一切变得简单 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.itzi.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: wenliang <www.vvv@qq.com>
// +----------------------------------------------------------------------

class CategoryAction extends AdminAction {

	public function index(){
		$Category = D("Category");  // 实例化Category对象
		$list = tree_to_list2(list_to_tree($Category->select()));
		$this->assign('list',$list);                // 输出列表数据
		$this->assign("rurl", $_SERVER["REQUEST_URI"]);
		$this->display();

	}

	public function add(){
		$Category = D("Category"); // 实例化Category对象
		if(IS_POST){
			if (!$Category->create()){
				// 如果创建失败 表示验证没有通过 输出错误提示信息
				$this->error($Category->getError());
			}else{
				// 验证通过 可以进行其他数据操作
				$re = $Category->addCategory();
				if ($re !== false) {
					$rurl = base64_decode($_GET["rurl"]);
					$rurl = empty($rurl)?"/admin/category":$rurl;
					$this->success('数据保存成功！', $rurl);
				} else {
					$this->error($Category->getError());
				}
			}
		}else{
			$this->assign('field_pid',$Category->field_pid);
			$this->display();
		}
	}

	public function edit(){
		$Category = D("Category"); // 实例化Category对象
		if(IS_POST){
			if (!$Category->create()){
				// 如果创建失败 表示验证没有通过 输出错误提示信息
				$this->error($Category->getError());
			}else{
				// 验证通过 可以进行其他数据操作
				$re = $Category->saveCategory();
				if ($re !== false) {
					$rurl = base64_decode($_GET["rurl"]);
					$rurl = empty($rurl)?"/admin/category":$rurl;
					$this->success('数据保存成功！', $rurl);
				} else {
					$this->error($Category->getError());
				}
			}
		}else{
			$id = I("get.id","","trim,stripslashes,strip_tags,intval");
			$map["id"] = $id;
			$doc = $Category->where($map)->find();
			$this->assign('doc',$doc);
			$this->assign('field_pid',$Category->field_pid);
			$this->display();
			
		}
	}

	public function del(){
		$Category = D("Category"); // 实例化Category对象
		if(IS_POST){
			$id = I("get.id","","trim,stripslashes,strip_tags,intval");
			$map = array();
			$map["id"] = $id;
			$re = $Category->where($map)->deleteCategory();
			if ($re !== false) {
				$rurl = base64_decode($_GET["rurl"]);
				$rurl = empty($rurl)?"/admin/category":$rurl;
				$this->success('数据删除成功！', $rurl);
			} else {
				$this->error($Category->getError());
			}
		}else{
			$id = I("get.id","","trim,stripslashes,strip_tags,intval");
			$this->assign('id',$id);
			$this->display();
		}
	}
}
?>
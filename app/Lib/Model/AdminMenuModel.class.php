<?php
// +----------------------------------------------------------------------
// | ITZI [ 让一切变得简单 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.itzi.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: wenliang <www.vvv@qq.com>
// +----------------------------------------------------------------------

class AdminMenuModel extends Model{

	protected $_validate = array(
		array('name', 'require', '名称填写不对！'), //
		array('url', 'require', '链接填写不对！'), //
	);
	protected $_auto = array ( 
		array('create_time','time',1,'function'), // 对create_time字段在更新的时候写入当前时间戳
		array('update_time','time',2,'function'), // 对create_time字段在更新的时候写入当前时间戳
	);

	function addAdminMenu(){
		$data = $this->data;
		if($this->custom_before_insert($data)){
			D("Table")->updateTable("admin_menu");
			if($this->add()){
				return $this->custom_after_insert($data);
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	function saveAdminMenu(){
		$data = $this->data;
		if($this->custom_before_update($data)){
			D("Table")->updateTable("admin_menu");
			if($this->save()){
				return $this->custom_after_update($data);
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	function deleteAdminMenu(){
		$id = $this->options["where"]["id"];
		if($this->custom_before_delete($id)){
			D("Table")->updateTable("admin_menu");
			if($this->delete()){
				return $this->custom_after_delete($id);
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	function custom_before_insert($data){
		$this->fixarray();
		return true;
	}

	function custom_before_update($data){
		$this->fixarray();
		return true;
	}

	function custom_before_delete($id){
		return true;
	}

	function custom_after_insert($data){
		$this->fixarray();
		return true;
	}

	function custom_after_update($data){
		$this->fixarray();
if (isset($data["group_id"])){
	$group_id = $data["group_id"];
	$id = $data["id"];
	D("AdminMenu")->where("pid = '{$id}'")->setField("group_id",$group_id);
}
		return true;
	}

	function custom_after_delete($id){
		return true;
	}
	
	function fixarray(){
		foreach ($this->data as $key => $value) {
			if(is_array($value)){
				$this->data[$key] = implode(",", $this->data[$key]);
			}
		}
	}

	function __get($property_name){
		if($property_name == 'field_pid'){
			$list = tree_to_list2(list_to_tree(D("AdminMenu")->select()));
			foreach($list as $k => $v){
				$result[$v["id"]] = $v["name"];
			}
			return $result;
		}
		if($property_name == 'field_group_id'){
			$list = D("AdminMenuGroup")->select();
			foreach($list as $k => $v){
				$result[$v["id"]] = $v["name"];
			}
			return $result;
		}
	}
}
?>
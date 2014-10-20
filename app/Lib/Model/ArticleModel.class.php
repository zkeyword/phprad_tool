<?php
// +----------------------------------------------------------------------
// | ITZI [ 让一切变得简单 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.itzi.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: wenliang <www.vvv@qq.com>
// +----------------------------------------------------------------------

class ArticleModel extends Model{

	protected $_validate = array(
		array('title', 'require', '标题填写不对！'), //
	);
	protected $_auto = array ( 
		array('create_time','time',1,'function'), // 对create_time字段在更新的时候写入当前时间戳
		array('update_time','time',2,'function'), // 对create_time字段在更新的时候写入当前时间戳
	);

	function addArticle(){
		$data = $this->data;
		if($this->custom_before_insert($data)){
			D("Table")->updateTable("article");
			if($this->add()){
				return $this->custom_after_insert($data);
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	function saveArticle(){
		$data = $this->data;
		if($this->custom_before_update($data)){
			D("Table")->updateTable("article");
			if($this->save()){
				return $this->custom_after_update($data);
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	function deleteArticle(){
		$id = $this->options["where"]["id"];
		if($this->custom_before_delete($id)){
			D("Table")->updateTable("article");
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
		if($property_name == 'field_is_top'){
			return array(
				"0" => "否",
				"1" => "是",
			);
		}
		if($property_name == 'field_category_id'){
			$list = tree_to_list2(list_to_tree(D("Category")->select()));
			foreach($list as $k => $v){
				$result[$v["id"]] = $v["name"];
			}
			return $result;
		}
	}
}
?>
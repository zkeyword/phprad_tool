<?php
// +----------------------------------------------------------------------
// | ITZI [ 让一切变得简单 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.itzi.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: wenliang <www.vvv@qq.com>
// +----------------------------------------------------------------------

class AdminAction extends Action {
    var $auid;
    var $auname;

    function _initialize(){
        $auid = mysession("auid");
    	if(empty($auid)){
    		$this->redirect("/admin/public/login");
    	}else{
            $this->auid = mysession("auid");
            $this->auname = mysession("auname");
        }
        if (!empty($_GET["curgroup"])) {
            mysession("curgroup", $_GET["curgroup"]);
        }
        $curgroup = mysession("curgroup");
        $group_id = empty($curgroup)?0:$curgroup;

    	$AdminMenuGroup = D("AdminMenuGroup")->order("`order` desc")->select();
        $this->assign('AdminMenuGroup', $AdminMenuGroup);
        $AdminMenu = tree_to_list2(list_to_tree(D("AdminMenu")->where("`group_id` = {$group_id}")->select()));
        $this->assign('AdminMenu', $AdminMenu);
        $this->assign('auname', $this->auname);
        $this->assign('auid', $this->auid);

        if(MODULE_NAME != "Index"){
            $this->upload();
        }
    }

    function upload(){
        if(IS_POST){
            $re = uploadImage();
            foreach ($re as $key => $value) {
                $_POST[$value["key"]] = $value["savepath"].$value["savename"];
            }
            $re = uploadFile();
            foreach ($re as $key => $value) {
                $_POST[$value["key"]] = $value["savepath"].$value["savename"];
            }
        }
    }
}
<?php

// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action
{
    
    public function index() {
        $this->display();
    }

    public function get_config_layout_list(){
        $call_back = I("get.call_back", "trim");
        $config_layout_list = D("ConfigLayout")->select();
        $this->assign('call_back',$call_back);
        $this->assign('config_layout_list',$config_layout_list);
        $this->display();
    }
}

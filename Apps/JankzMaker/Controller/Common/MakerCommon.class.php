<?php
// +----------------------------------------------------------------------
// | JankzMaker [ Just Do It And Think It ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.jankz.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: jankz <jankz@jankz.com> <http://www.jankz.com>
// +----------------------------------------------------------------------
namespace JankzMaker\Controller\Common;
use Think\Controller;

class MakerCommon extends Controller{
	private $meta_title;
	private $is_ajax = true;
	private $page_list;
	private $page_items = array();//定义页面元素
	private $extra_html = array();//可能需要的额外HTML
	private $post_url;
	private $set_coulmn;//设置分栏 默认为一栏
	private $template;

	protected function _initialize(){
		$this->template = APP_PATH.'JankzMaker/View/Common/common.html';
	}
	public function setMetaTitle($meta_title){
		$this->meta_title = $meta_title;
		return $this;
	}
	public function setCoulmn($set_coulmn){
		$this->set_coulmn =$set_coulmn;
		return $this;
	}
	public function setUrl($post_url){
		$this->post_url =$post_url;
		return $this;
	}
	public function setAjax($is_ajax){
		$this->is_ajax = $is_ajax;
		return $this;
	}
	//设置分页
	public function setPage($page_list){
		$this->page_list = $page_list;
		return $this;
	}
	public function setExtraHtml($extra_html){
		$this->extra_html = $extra_html;
		return $this;
	}
	/**
	 * [普通叶面]
	 * @param [type] $name    [description]
	 * @param [type] $type    [description]
	 * @param [type] $title   [description]
	 * @param [type] $coulmn  [description]
	 * @param [type] $col_l   [description]
	 * @param [type] $col_d   [description]
	 * @param array  $options [description]
	 */
	public function addPageItem($type){
		$item['type'] = $type;
		$this->page_items[] = $item;
		return $this;
	}
	//设置可能页面数据
	public function pageData($page_data){
		$this->page_data =$page_data;
		return $this;
	}
	public function setTemplate($template){
		$this->template =$template;
		return $this;
	}
	public function display(){
		$this->assign('meta_title',$this->meta_title);
		$this->assign('post_url',$this->post_url);
		$this->assign('is_ajax',$this->is_ajax);
		$this->assign('set_coulmn',$this->set_coulmn);
		$this->assign('page_list',$this->page_list);
		$this->assign('page_items',$this->page_items);
		// var_dump($this);打印查看测试
		parent::display($this->template);
	}
}

 ?>
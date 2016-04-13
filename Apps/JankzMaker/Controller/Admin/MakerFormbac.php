<?php
/**
 * @authors jankz (jankz@jankz.com)
 * @date    2016-01-07 17:27:18
 * @qq   979890264
 * @version v1.0
 */
namespace JankzMaker\Controller\Admin;
use Think\Controller;
class MakerForm extends Controller{
	private $meta_title;
	private $post_url;
	private $form_items = array();
	private $form_data = array();
	private $extra_html;
	private $is_ajax = true;
	private $set_coulmn;//设置分栏 默认为一栏
	private $template;

	protected function _initialize(){
		$this->template =APP_PATH.'JankzMaker/View/Admin/jankzform.html';
	}
	public function setMetaTitle($meta_title){
		$this->meta_title = $meta_title;
		return $this;
	}
	public function setCoulmn($set_coulmn = 1){
		$this->set_coulmn =$set_coulmn;
		return $this;
	}

	public function setUrl($post_url){
		$this->post_url = $post_url;
		return $this;
	}
	public function setAjax($is_ajax){
		$this->is_ajax = $is_ajax;
		return $this;
	}
	public function setTemplate($template){
		$this->template = $template;
		return $this;
	}
	public function addFormItem($name,$type,$title,$value,$coulmn=1,$col_l=2,$col_d=10,$options=array()){
		$item['name']=$name;
		$item['type']=$type;
		$item['title']=$title;
		$item['value']=$value;
		$item['options']=$options;
		$item['coulmn']=$coulmn;
		$item['col_l'] =$col_l;
		$item['col_d'] =$col_d;
		$this->form_items[] = $item;
		return $this;
	}
	public function addFormData($form_data){
		$this->form_data = $form_data;
		return $this;
	}
	public function display(){
		$this->assign('meta_title',$this->meta_title);
		$this->assign('post_url',$this->post_url);
		$this->assign('form_data',$this->form_data);
		$this->assign('form_items',$this->form_items);
		$this->assign('set_coulmn',$this->set_coulmn);
		$this->assign('is_ajax',$this->is_ajax);
		parent::display($this->template);
	}



}


 ?>
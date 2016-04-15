<?php
namespace JankzMaker\Controller;
use Think\Controller;
class MakerForm extends Controller{
	private $meta_title;
	private $post_url;
	private $form_items = array();
	private $form_data = array();
	private $extra_html;
	private $is_ajax = true;
	private $template;

	protected function _initialize(){
		$this->template =APP_PATH.'JankzMaker/View/Admin/jankzform.html';
	}
	public function setMetaTitle($meta_title){
		$this->meta_title = $meta_title;
		return $this;
	}
	public function setUrl($post_url){
		$this->post_url = $post_url;
		return $this;
	}
	public function setTemplate($template){
		$this->template = $template;
		return $this;
	}
	public function addFormItem($name,$type,$title,$options=array(),$col_l=2,$col_d=10){
		$item['name']=$name;
		$item['type']=$type;
		$item['title']=$title;
		$item['options']=$options;
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
		$this->assign('is_ajax',$this->is_ajax);
		parent::display($this->template);
	}



}


 ?>
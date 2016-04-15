<?php
// +----------------------------------------------------------------------
// | JankzMaker [ Just Do It And Think It ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.jankz.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: jankz <jankz@jankz.com> <http://www.jankz.com>
// +----------------------------------------------------------------------
namespace JankzMaker\Controller\Admin;
use Think\Controller;
class MakerForm extends Controller{
	private $meta_title;
	private $post_url;
	private $form_items = array();
	private $form_data = array();
	private $fields = array();
	private $db_fields= array();
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
	//添加一行 $conf 可以为checkbox radio select提供数据 或者css
	//$conf 要灵活使用 text password 等可以设置为空 或者class
	//checkbox 数据源 样式
	//radio 数据源 样式
	public function addField($name,$type,$title,$class='',$conf=''){
		$field['name'] = $name;
		$field['type']=$type;
		$field['title'] = $title;
		$field['conf']=$conf;
		$field['class']=$class;
		$this->fields[] = $field;
		return $this;

	}
	//添加一行 含有多个元素
	//这里注意区别
	public function addFields($name,$type,$conf=array(),$class=''){
		//$name 为标识符!一行多列 这又不同
		$field['name']=$name;
		$field['type']='fields';
		$field['title'] = '';//无用参数
		$field['class']=$class;
		$field['conf']='';
		foreach ($conf as $key => $value) {
			$inlinefield['name'] = $value[0];
			$inlinefield['type'] = $value[1];
			$inlinefield['title'] = $value[2];
			$inlinefield['conf'] =$value[3];
			$inlinefield['class'] =$value[3];
			$inlinefield['id'] = $field['name'];//设置标记
			$inlinefields[] = $inlinefield;
		}
		$field['conf']=$inlinefields;
		$this->fields[] = $field;
		return $this;
	}
	/**
	 * [数据库读取]
	 */
	public function setDbFields($db_fields=array()){
		$this->db_fields = $db_fields;
		return $this;
	}
	public function addFormData($form_data){
		$this->form_data = $form_data;
		return $this;
	}
	public function display(){

		//合并所有的表单项目
        $this->fields = array_merge($this->fields, $this->db_fields);

        //编译表单值
        if ($this->form_data) {
            foreach ($this->fields as &$field) {
                if ($this->form_data[$field['name']]) {
                    $field['value'] = $this->form_data[$field['name']];
                }
            }
        }
		$this->assign('meta_title',$this->meta_title);
		$this->assign('post_url',$this->post_url);
		$this->assign('form_data',$this->form_data);
		$this->assign('fields',$this->fields);
		$this->assign('set_coulmn',$this->set_coulmn);
		$this->assign('is_ajax',$this->is_ajax);
		parent::display($this->template);
	}



}


 ?>
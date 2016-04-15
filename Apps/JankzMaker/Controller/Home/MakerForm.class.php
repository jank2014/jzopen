<?php
namespace JankzMaker\Controller;
use Think\Controller;
class MakerForm extends Controller{
	private $meta_title;
	private $post_url;
	private $form_items = array();
	private $form_data = array();
	private $extra_html;
	private $is_ajax;
	private $template;

	protected function _initialize(){
		$this->template =APP_PATH.'JankzMaker/View/jankzform.html';
	}




}


?>
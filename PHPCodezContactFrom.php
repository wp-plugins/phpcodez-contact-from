<?php
/**
* Plugin Name: PHPCodez Contact Form
* Plugin URI: http://phpcodez.com/
* Description: A simple contact form plugin.
* Version: 0.1
* Author: Pramod T P
* Author URI: http://phpcodez.com/pramodtp
*/

class PHPCodezContactForm
{
	function PHPCodezContactForm(){
		add_action('admin_menu', array(&$this, 'phpcodezContactForm_Menu'));
		add_shortcode('phpcodez-contact-form', array(&$this, 'phpcodezContactFormTemplate'));
	}
	
	function phpcodezContactForm_Menu(){
		add_menu_page('Contact Form', 'Contact Form', 8, 'PHPCodezContactFormSetting', array(&$this,'PHPCodezContactFormSetting'));
	}
	
	function PHPCodezContactFormSetting(){
		include("PHPCodezContactFormSetting.php");
	}
	
	function phpcodezContactFormTemplate(){
		include("contact-us.php");
	}
	
}

$pcfObj=new PHPCodezContactForm();
?>
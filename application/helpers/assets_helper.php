<?php
if (!defined('BASEPATH')) exit('No direct script access allowed'); 

if (!function_exists('css_url')){
	function css_url($nom, $internet=0){
		if ($internet == 0)
			return '<link href="' . base_url() . 'assets/css/' . $nom . '.css"' . ' rel="stylesheet" type="text/css" />';
		else
			return '<link href="' . $nom . '" rel="stylesheet" type="text/css" />';

	}
}

if (!function_exists('js_url')){
	function js_url($nom, $internet=0){
		if ($internet == 0)
			return '<script src="' . base_url() . 'assets/js/' . $nom . '.js"' . ' type="text/javascript" defer></script>';
		else
			return '<script src="' . $nom . '" type="text/javascript" defer></script>';
	}
}

if (!function_exists('img_url')){
	function img_url($nom){
		return base_url() . 'assets/images/' . $nom;
	}
}

if (!function_exists('img')){
	function img($nom, $class='', $alt=''){
		return '<img src="' . img_url($nom) . '" class="' . $class . '" "alt="' . $alt .  '"/>';
	}
}

if (!function_exists('video_url')){
	function video_url($id,$src,$type){
		return '<video autoplay loop id="' . $id . '" <source src="' . base_url() . 'assets/video/' . $src .'" type="' . $type . '"></video><div class="lecture"><em class="glyphicon glyphicon-pause"></em></div><div class="sound"><em class="glyphicon glyphicon-volume-up"></em></div>';
	}
}
?>
<?php

class Comments Extends CI_Controller{
	function add_comment($postID){
		if (!$_POST){
			redirect(base_url().'eventpage/index/'.$postID);
		}

		/*$user_type=$this->session->userdata('logged_in');
		if(!$user_type){
			redirect(base_url().'login');
		}*/
		$this->load->model('comment');
		$data=array(
			'postID'=>$postID,
			'userID'=>$this->session->userdata('logged_in')['id'],
			'comment'=>$_POST['comment']
			);
		$this->comment->add_comment($data);
		//redirect(base_url().'posts/post/'.$postID);
		redirect('eventpage/index/'. $postID, 'refresh');
	}
}


?>
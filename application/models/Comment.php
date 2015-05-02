<?php

class Comment Extends CI_Model{
	function add_comment($data){
		$this->db->insert('comments',$data);
	}

	function get_comments($postID){
		
		$this -> db ->select('comments.*, users.username');
		$this -> db ->from('comments');
		$this -> db	->join('users', 'users.id = comments.userID', 'left');
		$this -> db	->where('postID', $postID);
		$this -> db	->order_by('comments.date_added', 'asc');
		
		$query=$this->db->get();
		return $query->result_array();
	}
}

?>
<?php
Class Registration extends CI_Model
{
	function get_events_registered($user_id)
	{
		$this -> db -> select('*');
	    $this -> db -> from('registrations');
	    $this -> db -> where('user_id', $user_id);

	    $query = $this -> db -> get();
	    
	    return $query->result();
	}

	function unregister_player($event_id, $user_id)
	{
		$this->db->delete('registrations', array('event_id' => $event_id, 'user_id' => $user_id)); 
	}

	function add_player_to_event($event_id, $user_id)
	{
		$this -> db -> set('event_id', $event_id);
	    $this -> db -> set('user_id', $user_id);
    	$this -> db -> set('date', date_format(new DateTime('NOW'), 'Y-m-d H:i:s'));
	    $this -> db -> insert('registrations');

	    if ($this->db->affected_rows() > 0)
	        return true;
	    else
	      	return false;
	}
}
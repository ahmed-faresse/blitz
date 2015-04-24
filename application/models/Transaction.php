<?php
Class Transaction extends CI_Model
{
	function donate($donor_id, $event_id, $amount)
	{
		$this -> db -> set('donor_id', $donor_id);
	    $this -> db -> set('event_id', $event_id);	    $this -> db -> set('amount', $amount);
    	$this -> db -> set('date', date_format(new DateTime('NOW'), 'Y-m-d H:i:s'));
	    $this -> db -> insert('transactions');

	    if($this->db->affected_rows() > 0)
	        return true;
	    else
	      	return false;
	}
}
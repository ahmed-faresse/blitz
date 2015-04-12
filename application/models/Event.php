<?php
Class Event extends CI_Model
{
 function get_events()
 {
   $this -> db -> select('username, name, description, image_path');
   $this -> db -> from('events');
   $this -> db -> join('users', 'events.author_id = users.id'); 

   $query = $this -> db -> get();

   return $query->result();
 }

}
?>
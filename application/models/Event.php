<?php
Class Event extends CI_Model
{

 function get_full_event($id)
 {
   if ($id != null)
   {
      $this -> db -> select('id, name, description, short_description, place, date, price_asked, price_funded, image_path, image_large_path');
      $this -> db -> from('events');
      $this -> db -> where("id", $id); 

      $query = $this -> db -> get();

      return $query->row();
   }
 }

 function get_events()
 {
   $this -> db -> select('events.id, username, name, description, short_description, price_asked, price_funded, image_path');
   $this -> db -> from('events');
   $this -> db -> join('users', 'events.author_id = users.id'); 

   $query = $this -> db -> get();

   return $query->result();
 }

 function search_events($value)
 {
   $this -> db -> select('events.id, username, name, description, short_description, image_path');
   $this -> db -> from('events');
   $this -> db -> join('users', 'events.author_id = users.id');
   $this -> db -> where("image_path LIKE '%{$value}%'");

   $query = $this -> db -> get();
   return $query->result();
 }
}
?>
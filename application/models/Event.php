<?php
Class Event extends CI_Model
{

 function update_event($id, $name, $desc, $price, $place, $date, $time)
 {
   $data = array(
               'name' => $name,
               'description' => $desc,
               'price_asked' => $price,
               'place' => $place,
               'date' => date("Y-m-d H:i:s", strtotime($date . " " . $time))
            );

   $this -> db -> where('id', $id);
   $this -> db -> update('events', $data); 
 }

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
   $this -> db -> select('events.id, author_id, username, name, description, place, date, short_description, price_asked, price_funded, image_path');
   $this -> db -> from('events');
   $this -> db -> join('users', 'events.author_id = users.id');
   $this -> db -> order_by("date"); 

   $query = $this -> db -> get();
   return $query->result();
 }

 function search_events($value)
 {
   $this -> db -> select('events.id, author_id, username, name, description, place, date, short_description, price_asked, price_funded, image_path');
   $this -> db -> from('events');
   $this -> db -> join('users', 'events.author_id = users.id');
   $this -> db -> where("image_path LIKE '%{$value}%'");
   $this -> db -> order_by("date"); 

   $query = $this -> db -> get();
   return $query->result();
 }

 function fund_event($event_id, $amount)
 {
   $event = $this->get_full_event($event_id);

   $this -> db -> where('id', $event_id);
   $this -> db -> update('events', array('price_funded' => $event->price_funded  + $amount));
 }

 function create_event($name, $description,$short_description,$place,$date,$price_asked,$price_funded,$current_people,$max_people,$author_id,$image_path,$image_large_path){
   $data = array(
          'name' => $name,
          'description' => $description,
          'short_description' => $short_description,
          'place' => $place,
          'date' => date("Y-m-d H:i:s", strtotime($date)),
          'price_asked' => $price_asked,
          'price_funded' => $price_funded,
          'current_people' => $current_people,
          'max_people' => $max_people,
          'author_id' => $author_id,
          'image_path' => $image_path,
          'image_large_path' => $image_large_path
      );
   $this -> db -> insert('events', $data);
   if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
 }


}
?>
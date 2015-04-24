<?php
Class User extends CI_Model
{
 function login($username, $password)
 {
   $this -> db -> select('id, username, email, password');
   $this -> db -> from('users');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', MD5($password));
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }

  function register($email,$username,$password)
  {
    $this -> db -> set('email', $email);
    $this -> db -> set('username', $username);
    $this -> db -> set('password', MD5($password));
    $this -> db -> insert('users');

    if($this->db->affected_rows() > 0)
    {
        return true;
    }
    else
    {
        return false;
    }
  }

  function forgotpassword($email){
    $this -> db -> select('id, username,email,password');
    $this -> db -> from('users');
    $this -> db -> where('email', $email);
    $this -> db -> limit(1);

     $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
  }
}
?>
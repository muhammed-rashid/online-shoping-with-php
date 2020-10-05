<?php
class wishlist{
    public $db = null;

    public function __construct(DBcontroler $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function add_to_wish_list($item_id,$user_id,$table='wishlist'){
    $sql = "INSERT INTO wishlist(item_id,user_id) values({$item_id},{$user_id})";
   
    $result = $this->db->con->query($sql);
    return $result;


   }
   public function get_wish_list($user_id,$table='wishlist')
   {
   $sql = "SELECT * FROM {$table} WHERE user_id = {$user_id}";
   $result = $this->db->con->query($sql);
 if($result != null){
     $wish_list_array = [];
     foreach ($result as $key){
         //var_dump($key);
         array_push($wish_list_array,$key);
     }
     return $wish_list_array;
 }
   }

   public function delete_wish($item_id,$user_id,$table = 'wishlist'){
    
    $query = "DELETE FROM {$table} WHERE item_id = {$item_id} && user_id={$user_id}";
    $result = $this->db->con->query($query);
    if($result){
        header("location:cart.php");
    }
    }

}
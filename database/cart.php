<?php

class cart{
    public $db = null;
    public function __construct(DBcontroler $db){
        if(!isset($db->con)) return null;
        $this->db =$db;
    }
    public function insert_to_cart($params = null,$table = 'cart'){
        if($params !=null){
            $columns = implode(',',array_keys($params));
            $values = implode(',',array_values($params));
            
            $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);
           $result = $this->db->con->query($query_string);

           return $result;
            
        }
    }

    public function addtocart($item_id,$user_id){
        $params = $arrayName = array
        ('item_id' => $item_id,
        'user_id' =>$user_id
    );

    $result = $this->insert_to_cart($params);
    if($result){
        header("location:".$_SERVER['PHP_SELF']);
    }
    }

    public function get_sum($arr){
        if(isset($arr)){
            $sum = 0;
            foreach($arr as $key){
                $sum  += $key[0];
                
            }
            return $sum;
        }
    }

    //deleting a record frome cart
    public function delete_cart($cart_id = null,$user_id,$table = 'cart'){
    
    $query = "DELETE FROM {$table} WHERE item_id = {$cart_id} && user_id={$user_id}";
    $result = $this->db->con->query($query);
    if($result){
        header("location:cart.php");
    }
    }

    //duplicating item

    public function get_cart_id($user_id = null, $table = 'cart'){
    $sql = "SELECT * from {$table} where user_id = {$user_id}";
    $result = $this->db->con->query($sql);
    $item_ids= [];
    foreach ($result as $key){
       array_push($item_ids,$key['item_id']);
    }
    return $item_ids;
    }
}
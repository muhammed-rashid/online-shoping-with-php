<?php
class product{
    public $db = null;

    public function __construct(DBcontroler $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // fetch product data using getData Method
    public function getData($table = 'product'){
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();

        // fetch product data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
           $resultArray[] = $item;       
        }

        return $resultArray;
    }

    public function get_product($item_id,$table='product'){
        if(isset($item_id)){
            $query = "SELECT * FROM {$table} WHERE item_id={$item_id}";
            $result = $this->db->con->query($query);
            $product_det = array();
            if($result !=null){
                while($row = mysqli_fetch_assoc($result)){
                    $product_det[] = $row;
                }
                return $product_det;
            }
            }
           
   

    }
    
}
<?php
class DBcontroler{
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $database = 'online_shopping';

    public $con = null;

    public function __construct(){

        $this->con = mysqli_connect($this->host,$this->user,$this->password,$this->database);

        if($this->con->connect_error){
            echo "error connecting to the database".$this->con->connect_error;
        }

    }

    public function __destruct(){
        $this->close_connection();
    }

    protected function close_connection(){
        if($this->con != null){
            $this->con->close();
            $this->con = null;
        }
    }
}


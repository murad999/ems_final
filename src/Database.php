<?php
//set_error_handler("var_dump");
class Database
{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $db_name = DB_NAME;
    public $link;
    public function __construct()
    {
        $this->connect();
    }
    private function connect(){
        $this->link = new mysqli($this->host,$this->user,$this->pass,$this->db_name);
    }

    public function select($query){
       $result = $this->link->query($query);
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }
    public function insert($query){
        $insert = $this->link->query($query);
        if($insert){
          echo "<p class='alert alert-success text-center'>" . "Data Save" . "</p>";
        }else{
            echo "Post did not inserted";
        }
    }
    public function insert_with_ajax($query){
        $insert = $this->link->query($query);
        if($insert){
          $output= "<p class='alert alert-success text-center'>" . "Data Save" . "</p>";
          //echo $output;
        }else{
            echo "Post did not inserted";
        }
    }
    public function update($query){
        $update = $this->link->query($query);
        if($update){ 
             
            echo "<p class='alert alert-success text-center'>" . "Data Updated" . "</p>";
            // if(!headers_sent())
            // header('location:?page=view/designation.php');
        }else{
            echo "Post did not updated";
        }
    }
    public function delete($query){
        $delete = $this->link->query($query);
        if($delete){
            header('location:index.php?msg = Post deleted...');
        }else{
            echo "Post did not deleted";
        }
    }
    public function deactive($query){

        $deactive= $this->link->query($query);
        if($deactive){
           if(!headers_sent());
            header('location:?page=view/current_paygrade.php');
        }else{
            echo "Post did not deleted";
        }
    }
    public function active($query){
        $active= $this->link->query($query);
        if($active){
            //return true;
            if(!headers_sent())
            header('location:?page=view/deactive_pay_list.php');
        }else{
            echo "Post did not deleted";
        }
    }
    function redirect($url, $permanent = false) {
        if($permanent) {
            header('HTTP/1.1 301 Moved Permanently');
        }
        header('Location: '.$url);
        exit();
    }
}
?>
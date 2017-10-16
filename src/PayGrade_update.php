<?php 

include_once('src/config.php');
include_once('src/Database.php');
$db=new Database();


$id=$_GET['id'];
//echo $id;exit;

//select all categories
$query = "SELECT * FROM paygrades WHERE id = '$id'";
$paygrades = $db->select($query);

$paygrades_single=$paygrades->FETCH_ASSOC();

//print_r($paygrades_single);exit;


//form action inserting process
if(isset($_POST['update'])){
    $title = $_POST['payg'];
    $basic = $_POST['basic'];
    if($title == '') {
        echo "<p class='alert alert-warning text-center'>" . "Please fill all the fields" . "</p>";
    }else{
        //print_r($_POST);exit();
        $query = "UPDATE paygrades SET name= '$title', basic='$basic' WHERE id='$id'";
        $insert = $db->update($query);
    }

}

?>
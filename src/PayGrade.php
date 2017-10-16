<?php 

include_once('src/config.php');
include_once('src/Database.php');
$db=new Database();

$query = "SELECT * FROM designations";
$designation = $db->select($query);

if(isset($_POST['submit'])){
 $data=$_POST;   
$payg_name=$data['payg_name'];
$salary_range=$data['salary_range'];
$desig=$data['desig'];

    if($payg_name == '' || $salary_range == '' || $desig == '') {
        echo "<p class='alert alert-warning text-center'>" . "Please fill all the fields" . "</p>";
    }else{
        //print_r($_POST);exit();
        //move_uploaded_file($image_tmp,"../assets/images/$image");
        $query = "INSERT INTO paygrades (name,basic,designation_id,status) VALUES ('$payg_name','$salary_range','$desig','0')";
        $insert = $db->insert($query);
    }

}

?>
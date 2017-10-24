<?php 
include_once('src/config.php');
include_once('src/Database.php');
$db=new Database();


if(isset($_POST['submit'])){
 $data=$_POST;   
$uname=$data['username'];
$email=$data['email'];
//echo $data['email'];
$desig=$data['desig'];
$payg_name=$data['payg_name'];
$pass=$data['password']=md5($data['password']);
$emp_info=$data['emp_info']=json_encode($data['emp_info']);
$join_date=$data['join_date'];
// echo "<pre>";
// print_r($data);
// echo "</pre>";
//inserting image
$image = $_FILES['image']['name'];
$image_tmp = $_FILES['image']['tmp_name'];
//echo $image_tmp;
    if($uname == '' || $pass == '' || $email == '' || $pass == '' || $desig=='' || $payg_name == '' || $emp_info=='' || $join_date == '' || $image == '') {
        echo "<p class='alert alert-warning text-center'>" . "Please fill all the fields" . "</p>";
    }else{
        //print_r($_POST);exit();
        move_uploaded_file($image_tmp,"vendor/images/$image");
        $query = "INSERT INTO employees (username,password,email,designation_id,paygrade_id,emp_info,joing_date, image) VALUES ('$uname','$pass','$email','$desig','$payg_name','$emp_info','$join_date','$image')";
        //echo $query;exit;
        $insert=$db->insert($query);
       
    }

}
?>
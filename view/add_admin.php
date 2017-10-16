<?php 

include_once('../src/config.php');
include_once('../src/Database.php');
$db=new Database();






if(!empty($_POST) || isset($_POST['submit'])){
    $output="";
 $data=$_POST;   
$uname=$data['username'];
//$pass=$_POST['password'];
$pass=$data['password']=md5($data['password']);
//inserting image
//$image = $_FILES['image']['name'];
//$image_tmp = $_FILES['image']['tmp_name'];
//echo $image_tmp;
    if($uname == '' || $pass == '') {
        echo "<p class='alert alert-warning text-center'>" . "Please fill all the fields" . "</p>";
    }else{
        //print_r($_POST);exit();
        //move_uploaded_file($image_tmp,"../assets/images/$image");
        $query = "INSERT INTO admins (username,password) VALUES ('$uname','$pass')";
        $insert = $db->insert_with_ajax($query);
    }
}



?>


            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add New Admin</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-8">
                    <form role="form" action="" method="post">
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                            <input type="text" name="password" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
            <hr>
            <!-- /.row -->
            <!-- /.row -->



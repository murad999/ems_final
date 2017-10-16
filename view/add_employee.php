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
    if($uname == '' || $pass == '' || $email == '' || $pass == '' || $desig=='' || $payg_name == || $emp_info=='' || $join_date == '' ||) {
        echo "<p class='alert alert-warning text-center'>" . "Please fill all the fields" . "</p>";
    }else{
        //print_r($_POST);exit();
        move_uploaded_file($image_tmp,"../vendor/images/$image");
        $query = "INSERT INTO employees (username,password,email,degination_id,paygrade_id,emp_info,joing_date, image) VALUES ('$uname','$pass','$email','$desig','$payg_name','$emp_info',$join_date,$image)";
        $insert = $db->insert($query);

    }

}



?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add New Employee</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-8">
                    <form role="form" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-paper-plane fa-fw"></i></span>
                            <input type="text" name="emp_info[fullname]" class="form-control" placeholder="Fullname">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                            <input type="text" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-mobile fa-fw"></i></span>
                            <input type="text" name="emp_info[phone]" class="form-control" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="">
                                <option default>Select Designation</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="">
                                <option default>Select Pay Grade</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                            <input type="date" name="join_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><i class="fa fa-institution fa-fw"></i>Address</label>
                            <textarea name="emp_info[address]" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-folder-open fa-fw"></i></span>
                            <input type="file" name="image" class="form-control" placeholder="">
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">Register</button>
                    </form>
                </div>
            </div>
            <hr>
            <!-- /.row -->
            <!-- /.row -->
       
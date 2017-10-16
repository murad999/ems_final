<?php 

include_once('../src/config.php');
include_once('../src/Database.php');
$db=new Database();



$output="";

if(!empty($_POST) || isset($_POST['submit'])){
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
        $insert = $db->insert_with_ajax($query);
        $query = "SELECT * FROM paygrades WHERE status='0' ORDER BY id DESC";

        $paygrade= $db->select($query);

        $output= "<p class='alert alert-success text-center'>" . "Data Save" . "</p>";
        $output.=' <table class="table">
                  <thead>
                  <tr>
                    <th>Paygrade Name</th>
                    <th>Basic Salary</th>
                    <th>Action</th><!-- <a href="?page=view/add_paygrade.php"></a> -->
                    <i class="fa fa-plus fa-fw"></i><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New</button>
                  </tr>
                  </thead>
                  <tbody>';
                  
        while ($row = $paygrade->FETCH_ASSOC()){
                  $output.='<tr>
                    <td>' .$row['name']. '</td>
                    <td>' .$row['basic'].'</td>
                     <td>
                         <a href="?page=view/edit_paygrade.php&id=' .$row['id'].' "  class="btn btn-info" >
                           <span class="glyphicon glyphicon-edit"></span>
                         </a>
                    </td>
                    <td>
                         <a href="?page=view/deactive_paygrade.php&id=' .$row['id'].' " >
                           <span class="btn btn-danger">Deactive</span>
                         </a>
                    </td>
                  </tr>';


        }
         $output.='</tbody>
                </table>';
          
    }
echo $output;
}

?>

 









<!--<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Add Paygrade</h1>
    </div>
    
    </div>
     /.row 
    <div class="row">
    <div class="col-md-8">
        <form role="form" action="" method="post">
            <div class="form-group">
                <input type="text" name="payg_name" class="form-control" placeholder="Enter Paygrade Name">
            </div>
            <div class="form-group">
                <input type="text" name="salary_range" class="form-control" placeholder="Salary Range">
            </div>
             <div class="form-group">
                <select class="form-control" name="desig">
                    <option default>Select Designation</option>
                    <?php while ( $row = $designation->FETCH_ASSOC()) : ?>
                    <option value=<?php echo $row['id']?>><?php echo $row['designation'] ?></option>
                <?php endwhile;?>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
</div>
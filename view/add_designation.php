<?php 

include_once('../src/config.php');
include_once('../src/Database.php');
$db=new Database();




$output="";

if(!empty($_POST) || isset($_POST['submit'])){
 $data=$_POST;   
$d_name=$data['designation'];

    if($d_name == '') {
        echo "<p class='alert alert-warning text-center'>" . "Please fill all the fields" . "</p>";
    }else{
        //print_r($_POST);exit();
        //move_uploaded_file($image_tmp,"../assets/images/$image");
        $query = "INSERT INTO designations (designation) VALUES ('$d_name')";
        $insert = $db->insert_with_ajax($query);
        $query = "SELECT * FROM designations ORDER BY id DESC";

        $designation= $db->select($query);
        $output= "<p class='alert alert-success text-center'>" . "Data Save" . "</p>";
        $output.=' <table class="table">
                  <thead>
                  <tr>
                    <th>Designation Name</th>
                    <!-- <a href="?page=view/add_designation.php"></a> -->
                    <th>Action</th>
                    <i class="fa fa-plus fa-fw"></i><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New</button>
                  </tr>
                  </thead>
                  <tbody>';
                  
        while ($row = $designation->FETCH_ASSOC()){
                  $output.=' <tr>
                    <td>' .$row['designation'].'</td>
                     <td>
                         <a href="?page=view/edit_designation.php&id= '.$row['id'].'  "  class="btn btn-info" >
                           <span class="glyphicon glyphicon-edit"></span>
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

 
<?php 

include_once('../src/config.php');
include_once('../src/Database.php');
$db=new Database();




$output="";

if(!empty($_POST) || isset($_POST['submit'])){
 $data=$_POST;   
$payitem_name=$data['payitem_name'];

    if($payitem_name == '') {
        echo "<p class='alert alert-warning text-center'>" . "Please fill all the fields" . "</p>";
    }else{
        //print_r($_POST);exit();
        //move_uploaded_file($image_tmp,"../assets/images/$image");
        $query = "INSERT INTO payitems (name) VALUES ('$payitem_name')";
        $insert = $db->insert_with_ajax($query);
        $query = "SELECT * FROM payitems ORDER BY id DESC";

        $payitem= $db->select($query);
        $output= "<p class='alert alert-success text-center'>" . "Data Save" . "</p>";
        $output.=' <table class="table">
                  <thead>
                  <tr>
                    <th>Designation Name</th>
                    <!-- <a href="?page=view/add_payitem.php"></a> -->
                    <th>Action</th>
                    <i class="fa fa-plus fa-fw"></i><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New</button>
                  </tr>
                  </thead>
                  <tbody>';
                  
        while ($row = $payitem->FETCH_ASSOC()){
                  $output.=' <tr>
                    <td>' .$row['name'].'</td>
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

 
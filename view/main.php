<?php 
include_once('src/config.php');
include_once('src/Database.php');
 //include_once('src/PayGrade.php');
$db=new Database();

$query="SELECT * FROM paygrades ORDER BY id ASC";

$paygrade=$db->select($query);

$query2="SELECT * FROM designations ORDER BY id ASC";

$designation=$db->select($query2);

$emp="SELECT * FROM employees ORDER BY id ASC";
$employees=$db->select($emp);

?>

<div class="row">
<h1 class="page-header">Dashboard</h1>
</div>
<div class="row">
    <div class="col-md-6">
        <div id="success"></div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <i class="fa fa-plus fa-fw"></i><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New Admin</button>
    </div>
    <div class="col-md-4">
        <i class="fa fa-plus fa-fw"></i><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalEmp">Add New Employee</button>
    </div>
</div>
<hr>
<?php 
// $query="SELECT employees.id,employees.fullname
//   FROM employees
//  INNER JOIN designations ON designations.id = employees.designation_id
//  INNER JOIN paygrades ON paygrades.id = employees.paygrade_id
//  ORDER BY employees.id";
// echo $query;exit;
// $alls=$db->select($query);

?>
<div class="row">
<?php foreach($employees as $employ){
    $user_info=json_decode($employ['emp_info'],true);

 ?>
    <div class="col-md-6">
      <div id="empInfo_table">
            <ul>
                <li id="data">
                    <div id="img">
                       <img src="vendor/images/<?php echo $employ['image'] ?>" alt="" width="200px" height="200px"> 
                    </div>
                    <div id="info">
                        <div class="title">Name:<?php echo $user_info['fullname']?> | join_date:<?php echo $employ['joing_date']?></div>
                        <div class="list">
                           <ul>
                                <li><?php echo $employ['designation_id']?></li>
                                <li><?php echo $employ['paygrade_id']?></li>
                                <li><?php echo $employ['email']?></li>
                                
                            </ul> 
                        </div>   
                    </div>
                </li>
            </ul>
        </div> 
    </div>
<?php }?>
</div>




<!-- Modal for Admin-->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Admin</h4>
        </div>
        <div class="modal-body">
           <div class="row">
                <div class="col-md-8">
					<form role="form" action="" method="post" id="admin_add">
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                            <input type="text" name="password" id="password" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <!-- Modal for Employe-->
  <div class="modal fade" id="myModalEmp" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Employee</h4>
        </div>
        <div class="modal-body">
           <div class="row">
                <div class="col-md-8">
					<form role="form" action="" id="empInfo" method="post" enctype="multipart/form-data">
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-paper-plane fa-fw"></i></span>
                            <input type="text" name="emp_info[fullname]" id="emp_info[fullname]" class="form-control" placeholder="Fullname">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                            <input type="text" name="password" id="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-mobile fa-fw"></i></span>
                            <input type="text" name="emp_info[phone]" id="emp_info[phone]" class="form-control" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="desig" id="desig">
                                <option default>Select Designation</option>
                                <?php while ( $row = $designation->FETCH_ASSOC()) : ?>
                            <option value=<?php echo $row['id']?>><?php echo $row['designation'] ?></option>
                        <?php endwhile;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="payg_name" id="payg_name">
                                <option default>Select Pay Grade</option>
                                 <?php while ( $row = $paygrade->FETCH_ASSOC()) : ?>
                            <option value=<?php echo $row['id']?>><?php echo $row['name'] ?></option>
                        <?php endwhile;?>
                            </select>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                            <input type="date" name="join_date" id="join_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><i class="fa fa-institution fa-fw"></i>Address</label>
                            <textarea name="emp_info[address]" id="emp_info[address]" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-folder-open fa-fw"></i></span>
                            <input type="file" name="image" id="image" class="form-control" placeholder="">
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">Register</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
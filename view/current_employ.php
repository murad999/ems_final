<?php 
include_once('src/config.php');
include_once('src/Database.php');
 //include_once('src/PayGrade.php');
$db=new Database();

$query="SELECT * FROM paygrades ORDER BY id ASC";

$paygrade=$db->select($query);

$query2="SELECT * FROM designations ORDER BY id ASC";

$designation=$db->select($query2);


?>
			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Current Employes</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="row">
    <div class="col-md-4">
        <a href="?page=views/add_admin.php"><i class="fa fa-plus fa-fw"></i><button type="button" class="btn btn-primary">Add New Admin</button></a>
    </div>
    <div class="col-md-4">
        <a href="?page=views/add_employee.php"><i class="fa fa-plus fa-fw"></i><button type="button" class="btn btn-primary">Add New Employee</button></a>
    </div>
</div><br/>
			
            <!-- /.row -->
             <div class="row">
                <div class="col-md-8">
                    <form role="form" action="?page=view/add_employee.php" method="post" enctype="multipart/form-data">
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-paper-plane fa-fw"></i></span>
                            <input type="text" name="emp_info[fullname]"  class="form-control" placeholder="Fullname">
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
                            <select class="form-control" name="desig">
                                <option default>Select Designation</option>
                                 <?php while ( $row = $designation->FETCH_ASSOC()) : ?>
                            <option value=<?php echo $row['id']?>><?php echo $row['designation'] ?></option>
                        <?php endwhile;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="payg_name">
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
                            <textarea name="emp_info[address]" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-folder-open fa-fw"></i></span>
                            <input type="file" name="image" class="form-control" placeholder="image">
                        </div>
                        <button type="submit" name="submit" class="btn btn-success">Register</button>
                    </form>
                </div>
            </div>
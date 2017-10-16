  <?php 

include_once('src/config.php');
include_once('src/Database.php');
$db=new Database();

$query = "SELECT * FROM designations ORDER BY id DESC";

$designation= $db->select($query);


?>
  <div class="row">
    <div class="col-md-12">
          <h1 class="page-header">Employee designation names</h1>
          <div class="row">
            <div class="col-lg-6">
              <div id="emp_table">
                <table class="table">
                  <thead>
                  <tr>
                    <th>Designation Name</th>
                    <!-- <a href="?page=view/add_designation.php"></a> -->
                    <th>Action</th>
                    <i class="fa fa-plus fa-fw"></i><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New</button>
                  </tr>
                  </thead>
                  <tbody>
                  <hr>
                <?php while ($row = $designation->FETCH_ASSOC()): //print_r($row);?>
                  <tr>
                    <td><?php echo $row['designation']; ?></td>
                     <td>
                         <a href="?page=view/edit_designation.php&id=<?php echo $row['id'] ?>"  class="btn btn-info" >
                           <span class="glyphicon glyphicon-edit"></span>
                         </a>
                    </td>
                  </tr>
                <?php endwhile;?>
                  </tbody>
                </table>
                </div>
            </div>
          </div>
        </div>

    </div>

</div>

<!-- Modal for Admin-->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Designation</h4>
        </div>
        <div class="modal-body">
           <div class="row">
                <div class="col-md-8">
                  <form role="form" action="" method="post" id="infoForm">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-cog fa-fw"></i></span>
                        <input type="text" name="designation" id="designation" class="form-control" placeholder="Add Designation">
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





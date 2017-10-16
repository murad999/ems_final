<?php include_once('src/help_function.php') ?>
<?php 

include_once('src/config.php');
include_once('src/Database.php');
$db=new Database();


$id=$_GET['id'];
//echo $id;exit;

//select all categories
$query = "SELECT * FROM designations WHERE id = '$id'";
$designations = $db->select($query);

$designations_single=$designations->FETCH_ASSOC();

//print_r($designations_single);exit;


//form action inserting process
if(isset($_POST['update'])){
    $title = $_POST['designation'];
    if($title == '') {
        echo "<p class='alert alert-warning text-center'>" . "Please fill all the fields" . "</p>";
    }else{
        //print_r($_POST);exit();
        $query = "UPDATE designations SET designation= '$title' WHERE id='$id'";
        $insert = $db->update($query);
        
    }
     
        

}

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Employee designation names</h1>
    </div>
    <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
    <div class="col-md-8">
        <form role="form" action="" method="post">
            <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-cog fa-fw"></i></span>
                <input type="text" name="designation" value="<?php echo $designations_single['designation'] ?>" class="form-control" placeholder="Add Designation">
            </div>
            <button type="submit" name="update" class="btn btn-success">Update</button>
        </form>
    </div>
</div>

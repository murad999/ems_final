<?php include_once('src/PayGrade_update.php'); ?>

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
            <div class="form-group">
                <input type="text" name="payg" value="<?php echo $paygrades_single['name'] ?>" class="form-control" placeholder="Add Designation">
            </div>
            <div class="form-group">
                <input type="text" name="basic" value="<?php echo $paygrades_single['basic'] ?>" class="form-control" placeholder="Add Designation">
            </div>
            <button type="submit" name="update" class="btn btn-success">Update</button>
        </form>
    </div>
</div>
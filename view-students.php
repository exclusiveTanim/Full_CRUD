<?php 
include('session.php');
include "includes/header.php"; 
?>
<br><br>

<!--View data-->
<?php
$sql = "SELECT * FROM `Student` ";
$qry = $conn->query($sql);
?>

<!--delete data-->
<?php 
    if (isset($_GET['delete'])) {
        $id = $_GET['id'];
        $sql ="DELETE FROM `Student` WHERE id='$id' ";
        $qr = $conn->query($sql);
        if ($qr) {
            echo "<div class='alert alert-danger'><strong>Your data has been deleted!!</strong></div>";
        }else{
            echo "<div class='alert alert-danger'><strong>Sorry!</strong> there is a problem.  </div>";
        }
    }
 ?>


<table class="table table-bordered table-striped text-center table-hovered">
    <tr class="text-center">
        <th>Sl.</th>
        <th>Student Name</th>
        <th>Email Address</th>
        <th>Contact</th>
        <th>Gender</th>
        <th>Mobile</th>
        <th>Action</th>
    </tr>
    <?php $i=1; ?>
    <?php while ($result = mysqli_fetch_assoc($qry)) { ?>
    <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $result['firstname']; ?></td>
        <td><?php echo $result['lastname']; ?></td>
        <td><?php echo $result['email']; ?></td>
        <td><?php echo "Female"; ?></td>
        <td><?php echo "1000000"; ?></td>
        
        <td>
            <a href="edit-student.php?id=<?php echo $result['id'];?>"  class="btn btn-success btn-xs" title="Edit" >
                <span class="glyphicon glyphicon-edit"></span>
            </a>
            <a href="?delete=true&id=<?php echo $result['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-danger btn-xs" title="Delete">
                <span class="glyphicon glyphicon-trash"></span>
            </a>
        </td>
    </tr>
    <?php } ?>
</table>


<!-- add new student -->
<?php
if(isset($_POST['btn'])){
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$mobile= trim($_POST['mobile']);
$address = trim($_POST['address']);
$gender = $_POST['gender'];

$sql = "INSERT INTO `students`(`name`, `email`, `mobile`, `address`, `gender`) VALUES ('$name','$email','$mobile','$address','$gender')";
$qry = $mysql->query($sql);
if ($qry) {
   echo "<script>window.location='view-students.php'</script>";


}else{
echo  "<div class='alert alert-danger'><strong>Sorry!</strong> Field must not be empty.  </div>";
}
}
?>
<!-- Add New User Modal -->
<div class="modal fade" id="addModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="modal-title text-primary" >Add  student</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body px-4">
                <form action=" " method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-4">Student Name</label>
                        <div class="col-md-8">
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Email</label>
                        <div class="col-md-8">
                            <input type="text" name="email" class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Contact</label>
                        <div class="col-md-8">
                            <input type="text" name="mobile" class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Address</label>
                        <div class="col-md-8">
                            <textarea class="form-control" name="address" required=""></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-4"> Gender </label>
                        <div class="col-md-8">
                            <label><input type="radio"  checked name="gender" value="M" /> Male</label> &nbsp; &nbsp;
                            <label><input type="radio"  name="gender" value="F"/> Female</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <input type="submit" class="btn btn-success btn-block" name="btn" value="Save Student info">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include "includes/footer.php"; ?>
<?php 
include('session.php');
include "includes/header.php"; ?>
<br><br>

<!-- fetch data for edit  -->
<?php 
	$id = $_GET['id'];
	$sql = "SELECT * FROM `Student` WHERE id='$id' ";
	$q =  $conn->query($sql);
	$rslt = mysqli_fetch_assoc($q);
 ?>

 <!-- update data-->
<?php
	if(isset($_POST['update'])){
		$name = trim($_POST['firstname']);
		$lname = trim($_POST['lastname']);
		$email= trim($_POST['email']);
		//$address = trim($_POST['address']);
		//$gender = $_POST['gender'];
	
	$sql = "UPDATE `Student` SET `firstname`='$name',`lastname`='$lname',`email`='$email' WHERE `id`='$id' ";
	$qry = $conn->query($sql);
	if ($qry) {
		  echo "<script>window.location='view-students.php'</script>";

		
	}else{
		echo "<div class='alert alert-danger'><strong>Sorry!</strong> there is a problem.  </div>";
		
	}
	}
?>

<div class="row ">
	<div class="col-md-8 col-md-offset-2">
		
		<div class="panel panel-default">
			
			<div class="panel-heading">
				<h4 class="text-center ">Update Student Info</h4>
			</div>
			<div class="panel-body">
				<form action=" " method="post" class="form-horizontal">
					<div class="form-group">
						<label class="control-label col-md-4">Student FName</label>
						<div class="col-md-8">
							<input type="text" name="firstname" value="<?= $rslt['firstname'] ?>" class="form-control">
							<input type="hidden" name="id" value="<?= $rslt['id'] ?>" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4">Student LName</label>
						<div class="col-md-8">
							<input type="text" name="lastname" value="<?= $rslt['lastname'] ?>" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4">Email</label>
						<div class="col-md-8">
							<input type="text" name="email" value="<?= $rslt['email'] ?>" class="form-control">
						</div>
					</div>
					<!--div class="form-group">
						<label class="control-label col-md-4">Address</label>
						<div class="col-md-8">
							<textarea class="form-control"  name="address"><?= $rslt['address'] ?></textarea>
						</div>
					</div-->
					
					<!--div class="form-group">
						<label class="control-label col-md-4"> Gender </label>
						<div class="col-md-8">
							<label><input type="radio"  checked name="gender" <?= $rslt['gender']=='M'?'checked':''; ?> value="M" /> Male</label>
							<label><input type="radio"  name="gender" <?= $rslt['gender']=='F'?'checked':''; ?> value="F"/> Female</label>
						</div>
					</div-->
					<div class="form-group">
						<div class="col-md-8 col-md-offset-4">
							<input type="submit" class="btn btn-success btn-block" name="update" value="Update Student info">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include "includes/footer.php"; ?>
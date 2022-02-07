
<?php
session_start();
include('database.php');

$id=intval($_GET['id']);// 

if(isset($_POST['submit']))
{
	$Name=$_POST['Name'];
	$Email=$_POST['Email'];
	$Phone=$_POST['Phone'];
	$Address=$_POST['Address'];
	$City=$_POST['City'];
	$State=$_POST['State'];
	
$sql=mysqli_query($conn,"update users set Name='$Name',Email='$Email',Phone='$Phone',Address='$Address',City='$City',State='$State' where id='$id' ");
$_SESSION['msg']="User Updated Successfully !!";
header('location:index.php?success=1');

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit User</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>




</head>
<body>
<?php include('header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
			
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Update User</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>




			<form class="form-horizontal row-fluid" name="updateuser" method="post" enctype="multipart/form-data">

<?php 

$query=mysqli_query($conn,"select Name,Email,Phone,Address,City,State from users where id='$id'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
  
?>


<div class="control-group">
<label class="control-label" for="basicinput">Name</label>
<div class="controls">
<input type="text"    name="Name" id="Name"  placeholder="Enter Name" value="<?php echo htmlentities($row['Name']);?>" class="span8 tip" >
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Email</label>
<div class="controls">
<input type="text"  name="Email" id="Email"  placeholder="Enter Email" value="<?php echo htmlentities($row['Email']);?>" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Contact No</label>
<div class="controls">
<input type="text"  name="Phone" id="Phone"  placeholder="Enter Phone No." value="<?php echo htmlentities($row['Phone']);?>" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Address</label>
<div class="controls">
<input type="text"  name="Address" id="Address"  placeholder="Enter Address" value="<?php echo htmlentities($row['Address']);?>" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">City</label>
<div class="controls">
<input type="text"  name="City" id="City"  placeholder="Enter City" value="<?php echo htmlentities($row['City']);?>" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">State</label>
<div class="controls">
<input type="text"  name="State" id="State"  placeholder="Enter State" value="<?php echo htmlentities($row['State']);?>" class="span8 tip" required>
</div>
</div>


<?php } ?>
	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Update</button>
											</div>
										</div>
									</form>
							</div>
						</div>


	
						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->



	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>

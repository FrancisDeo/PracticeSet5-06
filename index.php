<?php
	require('config/config.php');
	require('config/db.php');

	// Check For Submit
	if(isset($_POST['submit'])){
		// Get form data
		$lname = mysqli_real_escape_string($conn,$_POST['lname']);
		$fname = mysqli_real_escape_string($conn,$_POST['fname']);
		$address = mysqli_real_escape_string($conn,$_POST['address']);

		$query = "INSERT INTO list(LastName,FirstName,address,Date) VALUES('$lname', '$fname', '$address', now())";
    echo '<script>alert("success")</script>';
		if(mysqli_query($conn, $query)){
      header('Location: '.ROOT_URL.'');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}
?>


<?php include('inc/header.php'); ?>
<div class="container">
<br/>
  <h2>Registration</h2>

  <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="was-validated">
    <div class="form-group">
      <label for="uname">Last name:</label>
      <input type="text" class="form-control" id="lname" placeholder="Enter last name" name="lname" required>
      <div class="valid-feedback">Valid.</div>
    </div>
    <div class="form-group">
      <label for="uname">First name:</label>
      <input type="text" class="form-control" id="fname" placeholder="Enter first name" name="fname" required>
      <div class="valid-feedback">Valid.</div>
    </div>
    <div class="form-group">
      <label for="uname">Address:</label>
      <input type="text" class="form-control" id="address" placeholder="Enter address" name="address" required>
      <div class="valid-feedback">Valid.</div>
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember" required> I agreed to pass this course :D 
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Check this checkbox to continue.</div>
      </label>
    </div>
    <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
    <button type="button" style="float: right;" class="btn btn-dark btn-sm" onclick="document.location='guestbook-login.php'">Login</button>
  </form>
  
</div>
<?php include('inc/footer.php'); ?>


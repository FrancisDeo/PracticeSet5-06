<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "logapp";
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "SELECT User,Password FROM Account";
  $result = $conn->query($sql);

  // Check For Submit
	if(isset($_POST['submit'])){
		// Get form data
		$User = mysqli_real_escape_string($conn,$_POST['username']);
		$Pass = mysqli_real_escape_string($conn,$_POST['password']);
    $check = false;
    if (!empty($result) && $result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        if ($row["User"] == $User && $row["Password"] == $Pass){
          header("Location: guestbook-list.php");
          exit();
        }
        else{
          $errorMessage = 'Error \nWrong login credentials';
          echo "<script>alert(\"$errorMessage\"); window.location.href='guestbook-login.php';</script>";
        }
      }
    } else {
      echo "0 results";
    }
    
		if(mysqli_query($conn, $query)){
      header('Location: '.ROOT_URL.'');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}


?>
<?php include('inc/header.php'); ?>
  <br/>
  <div style="width:30%; margin: auto; text-align: center;">
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="form-signin">
      <img class="mb-4" src="img/bootstrap.svg" alt="" width="100" height="100">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Username</label>
      <input type="text" id="username" name="username" class="form-control" placeholder="Username" required="" autofocus="">
      <br/><label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="">
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button type="submit" name="submit" value="Submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
      <br>
      <button type="button" class="btn btn-lg btn-primary btn-block" onclick="document.location='Index.php'">Contract Tracing Form</button>
    </form>
  </div>
<?php include('inc/footer.php'); ?>
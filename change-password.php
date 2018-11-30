<?php require_once 'connection.php'; 
session_start();
?>

<?php 


if ($_GET['id']) {
  
  $oldpw = $_GET['oldpass'];
  $newpw = $_GET['changepass'];
  $conpw = $_GET['repeatpass'];
  // $currentpw = $_SESSION['password'];

  // check whether username exists 
  $query = "SELECT password FROM login_table WHERE username= '" . $_SESSION['username'] . "' AND password='$oldpw'";
  //----------------------------------no quotes^^^^^^^--single-quotes^^^^^^^^^^^^^^^^
  // Also adds a check that $oldpass is correct!

    $result = mysqli_query($con, $query);
  if(!$result) {
    // This is ambiguous. It should probably show an error related to the query, not connection
      $message = "<p class='message'>Error: Coud not connect to the database.</p>" ;
  } else {
      // This should only be done if a row was returned previously
      // Test with mysqli_num_rows()
        if (mysqli_num_rows($result) > 0) {
        
        // Adds single quotes to the username here too...
        $query = "UPDATE login_table SET password = '$newpw' WHERE username = '" . $_SESSION['username'] . "'";
        mysqli_query($con, $query) or
            die("Insert failed. " . mysqli_error($con));
          $message = "<p class='message'>Your password has been changed!</p>";

        // Process further here 
        mysqli_free_result($result);
        }
        else {
          $message = "<h4>Password not correct!</h4>";
        }
    }
}


?>
<html>
<body>

<style>

label, input {
    display: block;
}

label {
    margin-bottom: 1px;
}

</style>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<label>
  First Name: <input type="text" name="fname" ><br>
</label>
<label>
  Last Name: <input type="text" name="lname"><br>
</label>
<label>
  Age: <input type="text" name="age"><br>
</label>
  <input type="submit">
</form>

<?php

$user = "root";
$pass = "";
$db = "ktcdb";
$serverName = "localhost"; 

try {
$conn = mysqli_connect($serverName, $user, $pass, $db);

echo "Connected to the Database";

}
catch (PDOException $e)
{
echo $e->getMessage();
}


  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
  
  } else {
      echo "Server Error";
  }

  $sql = "INSERT INTO Users (FirstName, LastName, Age)
VALUES ('$fname', '$lname', '$age')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>

</body>
</html>
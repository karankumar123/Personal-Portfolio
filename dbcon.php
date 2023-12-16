<?php

//session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "std";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

// Collect the form data

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$comments = $_POST['comments'];

// $sql = "SELECT * from  inform_student where email='$email'";
// $result=mysqli_query($conn,$sql);
// $presesnt=mysqli_num_rows($result);
// if($presesnt>0)
// {
//   $_SESSION['email_alert'] ='1';
// //  header("Location:index.php");
  
// }
 
$query = mysqli_query($conn,"select * from inform_student where email='$email'" );
if(mysqli_num_rows($query)>0)
{
  
  echo'<script>
  alert("Email id already Exists!");
  window.location.href="index.html";
  </script>';
  

}
else{
$query ="insert into inform_student(name,email,mobile,comments) values
    ('$name','$email','$mobile','$comments')";

    //  echo"$query";
     mysqli_query($conn,$query);
     echo'<script>
     alert("data inserted successfull");
     window.location.href="index.html";
     </script>';
}
?>


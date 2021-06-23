<!Doctype html>
<html>
<head>
<title>Login</title>
</head>
<style>
header {
    width: 1265px;
    height: 100px;
    background-color: rgba(255,218,185);
    box-shadow: 10px 8px 5px #888888;
}
body
{
    min-height: 100%
   padding: 0;
   margin: 2%;
   position: relative;
   background-image: url("cook2.jpg");
   background-repeat: no-repeat;
   background-size:100%;
}

article{ 
        width:40%; 
        margin:auto ; 
        color:white;}
        
        box
{
    background-color: #4CAF50;
    color: white;
    font-size: 16px;
    border: none;
    cursor: pointer;
}
/*.dropbtn {
    background-color: maroon;
    color: white;
    padding: 8px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

/*footer {
    position:fixed;
    bottom:0;
    width: 1800px;
    height: 80px;
    background-color: black;
}
*/
</style>


<article>

<form name="login" action="" method="POST">

<tr>
<th>
<br><br>
<legend><i><u><b> Login </b></u></i></legend></br></br>
<fieldset>
<table>

<tr><td> Email: <td><input type="text" name="email" value=""> </td></tr>
<tr><td> Password: <td><input type="password" name="password" value=""> </td></tr>

</table>
<br>
<input type="submit" value="LOGIN" name="login" ><br>
</form></fieldset>
<br>
<a href = "forgot_password.php">Forgot password?</a>

</td>
</tr>
</table>
</article>

<?php
if(isset($_POST["login"]))
{
  $email=$_POST['email'];
  $password=$_POST['password'];
  
$conn = new mysqli("localhost", "root", "", "pruser") or die('Could not connect to the server\n: ' . mysqli_connect_error());
$result = mysqli_query($conn,"SELECT user_id FROM user_registration WHERE user_email='$email' AND password='$password'");

$numrows = mysqli_num_rows($result);
if($numrows>0)
{
	while($row = $result->fetch_assoc()) {
        $id = $row["user_id"];}
        
  session_start();
  $_SESSION['sess_user'] = $email;
  $_SESSION['user_id'] = $id;

/* Redirect browser */

header("Location: user_details.php");}

 else{
        $message3 = "Invalid username or password!";
        echo "<script type='text/javascript'>alert('$message3');</script>";
      }
}
if(isset($_POST["forgotpassword"]))
{
header("location:forgotpassword.php");
}
?>


</body>
</html>


<!DOCTYPE html>
<html>
<head>
<title>Forgot Password</title>

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
   background-image: url("!background2.jpg");
   background-repeat: no-repeat;
   background-size:100%;
}

article{ 
        width:40%; 
        margin:auto ; 
        color:#444;}
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 8px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

box
{
    background-color: #4CAF50;
    color: white;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

</style>

<body>

<h1 align="center"> FORGOT PASSWORD </h1>

<article><box>
<form name= "forgot_password" method="POST" action="">
<table border="10" align="center" width="600" bgcolor="black" >


<tr>
<th>Email ID</th>
<td><input type="email" name="user_email" maxlength="30" placeholder="Enter your valid Email ID"></td>
</tr>
<tr>
<th>Security Question</th>
<td><input type="radio" name="question" value="Name of your first Computer" checked="checked" required> Name of your first Computer<br>
    <input type="radio" name="question" value="Place of birth"> Place of birth <br>
    <input type="radio" name="question" value="Grandmother's name"> Grandmother name <br>
    <input type="radio" name="question" value="First grade teacher name"> First grade teacher name <br><br>
    Answer : <input type="text" name="answer"></td></tr> 
</td>
</tr>

<tr>
<th>New Password</th>
<td><input type="password" name="new_password" maxlength="20" placeholder="Minimum 7 characters" required/></td>
</tr>

<tr>
<td colspan="2" align="center">
<input type="submit" value="SUBMIT" name="submit" onclick="alert(Successful Signup!)"/>
 
<input type="reset" value="RESET"/>
 
</td>
</tr>

</table></box>
</article>
</form>

<br><a href='login.php'>Go to Login Page</a><br> 

<?php
if(isset($_POST["submit"]))
{
 
  $email = $_POST['user_email'];
  $question = $_POST['question'];
  $answer = $_POST['answer'];
  $new_password = $_POST['new_password'];
  
  echo $email;
$conn = new mysqli("localhost", "root", "", "pruser");
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 

$query = mysqli_query($conn, "SELECT user_id FROM user_registration WHERE user_email='$email' AND question='$question' AND answer='$answer'");
//echo mysqli_error($conn);

$numrows = mysqli_num_rows($query);


	if($numrows!=0)
	{
		$sql = "UPDATE user_registration SET password='$new_password' WHERE user_email='$email'";
		if(mysqli_query($conn,$sql))
  		{ 
  			
			$message = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password Updated!";
      echo $message;
		} 
  		else 
  		{
        		$message2 = "Account already exists! Please try again with another or login with your details 1!";
        		echo "<script type='text/javascript'>alert('$message2');</script>";
  		}
		 
	}
	else 
	{
        	$message2 = "Account already exists! Please try again with another or login with your details 2!";
        	echo "<script type='text/javascript'>alert('$message2');</script>";
  }
}

?>
</body>
</html>

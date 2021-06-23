<!Doctype html>
<?php
session_start();
	if(isset($_SESSION['sess_user'])) {
echo "Your session is running <br>" . $_SESSION['sess_user']."<br>";
	$a = $_SESSION['user_id']."<br>";
	echo "User ID :-".$a."";
	$b = $_SESSION["Carbohydrate"]."<br>";
	echo "Carbohydrate :-".$b."";
	$c = $_SESSION["Protein"]."<br>";
	echo "Protein :-".$c."";
	$d = $_SESSION["Fat"]."<br>";
	echo "Fat :-".$d."";
	$e = $_SESSION["calories"]."<br>";
	echo "calories :-".$e."";
}
?>

<html>
<head>

<link rel="stylesheet" href="finalstyles.css">

<title>Food Log</title>
</head>
<body>

<br><a href='BMI.php'>Calculate BMI</a><br>
<br><a href='nutrients_calculator.php'>Calculate Nutrients</a><br>
<br><a href='logout.php'>Logout</a><br><br>

<fieldset>

<legend><i><u><b> Food Log</b></u></i></legend><p></br>

<form name="Food Log" action="" method="POST">

<table border="10" align="center" width="600" bgcolor="white">

<tr>
<th>Food </th>

<td> <select name="food" size="5" multiple required>
    <option value="1">Roti (regular 60 gm whole wheat)</option>
    <option value="2">Rice (regular cup 158 gms)</option>
    <option value="3">Dal (regular cup 214 gms)</option>
    <option value="4">Cereal (regular small cup 28 gms)</option>
    <option value="5">Poha (regular cup 163 gms)</option>
     </select> <br>    
</td>
</tr>

<tr>
<th>Food Serving</th>
<td><input type="number" name="serving" placeholder="Enter serving" value="1" required/></td>
</tr>



<td colspan="2" align="center">
<input type="submit" value="SUBMIT" name="submit"/>
 
<input type="reset" value="RESET"/>
 
</td></tr>

</table>

</p><br>
</form>
</fieldset>
<br><br>

<?php
if(isset($_POST["submit"]))
{
	$food = $_POST['food'];
	$serving = $_POST['serving'];
	
	
	switch($food)
	{
		case 1: 
			
			$food_calories = 180 * $serving;
			$food_fat = 5.5 * $serving;
			$food_carbohydrate = 20 * $serving;
			$food_protein = 5 * $serving;
			
			echo "You consumed $food_calories calories. <br>";
			echo "You consumed $food_fat gms of fat. <br>";
			echo "You consumed $food_carbohydrate gms of carbs. <br>";
			echo "You consumed $food_protein gms of proteins. <br>";
			break;
			
		case 2: 
			
			$food_calories = 250 * $serving;
			$food_fat = 0.4 * $serving;
			$food_carbohydrate = 45 * $serving;
			$food_protein = 4.3 * $serving;
			
			echo "You consumed $food_calories calories. <br>";
			echo "You consumed $food_fat gms of fat. <br>";
			echo "You consumed $food_carbohydrate gms of carbs. <br>";
			echo "You consumed $food_protein gms of proteins. <br>";
			break;
		
		case 3: 
			
			$food_calories = 222 * $serving;
			$food_fat = 4.2 * $serving;
			$food_carbohydrate = 34 * $serving;
			$food_protein = 14 * $serving;
			
			echo "You consumed $food_calories calories. <br>";
			echo "You consumed $food_fat gms of fat. <br>";
			echo "You consumed $food_carbohydrate gms of carbs. <br>";
			echo "You consumed $food_protein gms of proteins. <br>";
			break;
			
		case 4: 
			
			$food_calories = 105 * $serving;
			$food_fat = 1.9 * $serving;
			$food_carbohydrate = 21 * $serving;
			$food_protein = 3.4 * $serving;
			
			echo "You consumed $food_calories calories. <br>";
			echo "You consumed $food_fat gms of fat. <br>";
			echo "You consumed $food_carbohydrate gms of carbs. <br>";
			echo "You consumed $food_protein gms of proteins. <br>";
			break;
			
		case 5: 
			
			$food_calories = 219 * $serving;
			$food_fat = 6.9 * $serving;
			$food_carbohydrate = 35 * $serving;
			$food_protein = 4 * $serving;
			
			echo "You consumed $food_calories calories. <br>";
			echo "You consumed $food_fat gms of fat. <br>";
			echo "You consumed $food_carbohydrate gms of carbs. <br>";
			echo "You consumed $food_protein gms of proteins. <br>";
			break;
	}

			if($food_calories>$_SESSION["calories"])
			{
				$cal_difference = $food_calories - $_SESSION["calories"];
				echo "<br>$cal_difference calories are excessive. <br>";
			}
			else
			{
				$cal_difference = $_SESSION["calories"] - $food_calories;
				echo "<br>$cal_difference calories lacking to maintain your body weigtht.<br>";
			}
			
			if($food_fat>$_SESSION["Fat"])
			{
				$fat_difference = $food_fat - $_SESSION["Fat"];
				echo "<br>$fat_difference gms of fat is excessive.<br>";
			}
			else
			{
				$fat_difference = $_SESSION["Fat"] - $food_fat;
				echo "<br>$fat_difference gms of fat are lacking to maintain your body weigtht.<br>";
			}
			
			if($food_carbohydrate>$_SESSION["Carbohydrate"])
			{
				$carb_difference = $food_carbohydrate - $_SESSION["Carbohydrate"];
				echo "<br>$carb_difference gms of carbs are excessive.<br>";
			}
			else
			{
				$carb_difference = $_SESSION["Carbohydrate"] - $food_carbohydrate;
				echo "<br>$carb_difference gms of carbs are lacking to maintain your body weigtht.<br>";
			}
			
			if($food_fat>$_SESSION["Protein"])
			{
				$protein_difference = $food_protein - $_SESSION["Protein"];
				echo "<br>$protein_difference gms of protein are excessive.<br>";
			}
			else
			{
				$protein_difference = $_SESSION["Protein"] - $food_protein;
				echo "<br>$protein_difference gms protein are lacking to maintain your body weigtht.<br>";
			}
	
	
	
	$conn = new mysqli("localhost", "root", "", "pruser");
	//if ($conn){ echo "Connected";}
	
	if ($conn->connect_error) 
	{
	    die("Connection failed: " . $conn->connect_error);
	} 

		$result = mysqli_query($conn,"SELECT * FROM user_meal WHERE user_id='$a'");

		$numrows = mysqli_num_rows($result);
		//echo "<script type='text/javascript'>alert('$numrows');</script>";

	if($numrows>0)
	{

		   /*$sql = "INSERT INTO user_meal(user_id, food_id, meal_time, calories, fats, carbohydrates, proteins) VALUES('$user_id','$food_id','$meal_time','$food_calories','$food_fat','$food_carbohydrate','$food_protein')";
  
	
  		if(mysqli_query($conn,$sql))
  		{ 
  			
			$message = "Food Added to Database Successfully!";
			echo "<script type='text/javascript'>alert('$message')</script>";
		} 
  		else 
  		{
  	 		$message2 = "Account already exists! Please try again with another or login with your details 1!";
        		echo "<script type='text/javascript'>alert('$message2');</script>";
  		}*/
		 
	}
	else 
	{
        	$message2 = "Account already exists! Please try again with another or login with your details 2!";
        	echo "<script type='text/javascript'>alert('$message2');</script>";
       	}
}
?>
<footer>
  <p>Made by: Pratiksha, Harshali And Sweta</p>
  <p>Contact information: <a href="pratiksha@gmail.com">pratiksha@gmail.com</a>.</p>
</footer>
</body>
</html>

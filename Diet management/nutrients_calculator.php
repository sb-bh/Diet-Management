<!Doctype html>
<?php
	session_start();
	if(isset($_SESSION['sess_user'])) 
{
		echo "Your session is running <br>" . $_SESSION['sess_user']."<br>";
		echo "Your session is running <br>" . $_SESSION['user_id']."<br>";
  	}
?>
<html>
<head>
<link rel="stylesheet" href="finalstyles.css">
<title>Nutrients Calculator</title>
</head>
<body>

<br><a href='BMI.php'>Calculate BMI</a><br>
<br><a href='logout.php'>Logout</a><br><br>
<br><a href='food_diary.php'>Continue to Food log</a><br><br>

<fieldset>

<legend><i><u><b> Nutrients Calculator </b></u></i></legend><p></br>

<form name="NC" action="" method="POST">

<table border="5">

<tr>
<th>Lifestyle</th>

<td><input type="radio" name="lifestyle" value="1.2" checked="checked" required> Minimum physical activity <br>
    <input type="radio" name="lifestyle" value="1.37"> Minor activity (exercise 1-2 days/week) <br>
    <input type="radio" name="lifestyle" value="1.55"> Moderate activity (exercise 3-5 days/week) <br>
    <input type="radio" name="lifestyle" value="1.72"> Active life (6-7 times weekly exercise) <br>
    <input type="radio" name="lifestyle" value="1.9"> Extremely active (Very hard exercise/sports & physical job) <br>    
</td>
</tr>

<tr>
<th>Physical Activity Level</th>

<td><input type="radio" name="activity" value="0.4" checked="checked" required> Sedentary Adult <br>
    <input type="radio" name="activity" value="0.75"> Adult recreational exerciser <br>
    <input type="radio" name="activity" value="0.90"> Adult competitive athlete <br>
    <input type="radio" name="activity" value="0.90"> Adult building muscle mass <br>
    <input type="radio" name="activity" value="1.00"> Growing teenage athlete <br>    
</td>
</tr>


<tr>
<th>Fat Percentage</th>

<td><input type="radio" name="fat_perc" value="0.15" checked="checked" required> Maintain fat in diet at 15% <br>
    <input type="radio" name="fat_perc" value="0.10"> Maintain fat in diet at 20% <br>
    <input type="radio" name="fat_perc" value="0.25"> Maintain fat in diet at 25% <br>
    <input type="radio" name="fat_perc" value="0.30"> Maintain fat in diet at 30% <br>
    <input type="radio" name="fat_perc" value="0.35"> Maintain fat in diet at 35% <br>    
</td>
</tr>

<td colspan="2" align="center">
<input type="submit" value="SUBMIT" name="submit"/>
 
<input type="reset" value="RESET"/>
 
</td></tr>

</table>

</p><br>
</form>
</fieldset>

<?php
if(isset($_POST["submit"]))
{
  $lifestyle = $_POST['lifestyle'];
  
  $activity = $_POST['activity'];
  $fat_perc = $_POST['fat_perc'];
  
  $email = $_SESSION['sess_user'];
	$id = $_SESSION['user_id'];
	echo $email."<br>";
	echo $id." here <br>";
	
$conn = new mysqli("localhost", "root", "", "pruser") or die('Could not connect to the server\n: ' . mysqli_connect_error());

$result = mysqli_query($conn,"SELECT * FROM user_registration WHERE user_email='$email'");

$numrows = mysqli_num_rows($result);


if($numrows>0)
{	
	while($row = $result->fetch_assoc()) { $name = $row["user_name"];}
        
	$result2 = mysqli_query($conn,"SELECT * FROM user_specs WHERE user_id='$id'");

	$numrows2 = mysqli_num_rows($result2);
 	
	if($numrows2>0)
	{
		 while($row = $result2->fetch_assoc()) 
		 {
       			//echo "id:" . $row["user_id"]. "<br> Name: " . $row["user_name"]. "<br> Email: " . $row["user_email"]. "<br>";
        echo "Gender:" . $row["gender"]. "<br> Height: " . $row["height"]. "<br> Weight" . $row["weight"]. "<br> Age" . $row["age"]. "<br>";
        
   			$gender = $row["gender"];
 			$height = $row["height"];
  			$weight = $row["weight"];
			$age = $row["age"];
        
    		}
	}
 if($gender=='Male')
  {
  	$BMR1 = 66 + 13.7 * $weight + 5 * $height - 6.8 * $age;			// Harris Benedict equation
	
	echo "trial".$BMR1."";
	
  	$BMR2 = 10 * $weight + 6.25 * $height - 5 * $age + 5;			// Mifflin-ST Jeor equation
  }
  else
  {
  	$BMR1 = 655 + 9.6 * $weight + 1.8 * $height - 4.7 * $age;
  	$BMR2 = 10 * $weight + 6.25 * $height - 5 * $age - 161;
  }
  
  //CALCULATIONS FOR CALORIES, FATS, PROTEINS AND CARBOHYDRATES
  
	echo "<br><br>";

  	$calories = $BMR1 * $lifestyle;				//Total calories needed
  	 
	 echo "Calculations of calories:-".$calories."<br>";
  	
  	$Fat = ($fat_perc * $calories)/9;
 	$Fat_cal = ($fat_perc * $calories);

	echo "Fats :-".$Fat."<br>";
	
	echo "Total fat calculations:-".$Fat_cal."<br>";
	
 	$Protein = round(($activity * ( $weight / 2.2046)), 3);
  	$Protein_cal = $Protein * 4;				//proteins in calories
	
	echo "Protein :-".$Protein."<br>";
	
	echo "Total proteins calculations :-".$Protein_cal."<br>";
  	
  	$Carbohydrate_cal = $calories - ($Protein_cal + $Fat_cal);
  	$Carbohydrate = $Carbohydrate_cal/4;
	
	echo "Total carbohydrate calculations :-".$Carbohydrate."<br>";
  	
  	echo "<br><br>";
	echo "<b>Hello $name, your <u>Basal Metabolic Rate (BMR)</u> according to the Harris Benedict equation is <u>$BMR1</u>. <br><br>";
	echo "Your <u>Basal Metabolic Rate (BMR)</u> according to the Mifflin-ST Jeor equation is <u>$BMR2</u>. <br><br>";
	echo "This indicates the amount of calories you require daily keeping in mind your body height, weight, age, and gender. <br><br>";
	echo "<u>$calories</u> are the approximate number of calories you need each day to maintain your weight (Harris Benedict).<br><br></b>";
	
	echo "<u>$Protein gms</u> are the approximate number of <u>Proteins</u> you need each day based on your weight.<br></b>";
	echo "<u>$Fat gms</u> are the approximate number of <u>Fats</u> you need each day in your diet.<br></b>";
	echo "<u>$Carbohydrate gms</u> are the approximate number of <u>Carbohydrates</u> you need each day in your diet.<br><br></b>";
	
	
	$_SESSION["Carbohydrate"] = $Carbohydrate;
	$_SESSION["Protein"] = $Protein;
	$_SESSION["Fat"] = $Fat ;
	$_SESSION["calories"] = $calories;
	
	//$_SESSION['userName'] = 'This is Ketki';
	
	$_SESSION['sess_user'] = $email;
	$_SESSION['user_id'] = $id;
	
		 
	}
}	  

?>

<footer>
  <p>Made by: Pratiksha,Harsha And Shweta </p>
  <p>Contact information: <a href="pratiksha@gmail.com">pratiksha@gmail.com</a>.</p>
</footer>

</body>
</html>

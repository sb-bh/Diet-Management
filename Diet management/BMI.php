<!DOCTYPE HTML>
<html>  
<head>  
<title>BMI Calculator</title>
</head>
<link href="finalstyles.css" rel="stylesheet" type="text/css">
<body> 
<form action="BMI.php" method="POST" id="contactform">
<table><tr><td colspan="2" align="center" bgcolor="#006600"><h2>BMI Calculator</h2></td></tr>
  <tr><td colspan="2">&nbsp;</td></tr>
<tr><td><strong>Height in meters</strong><br>
(Height must be a value between 0 and 2.5 mtrs)</td>
  <td><input type="text" name="height" maxlength="4"></td></tr>
<tr><td colspan="2">&nbsp;</td></tr><tr><td><strong>Weight in kilograms
</strong><br>Weight must be a value between 0 and 500 kgs</td>
<td><input type="text" name="weight" maxlength="3"></td></tr>
<tr><td colspan="2"><input name="input" type="submit" class="button" value="Calculate" /><input name="input" type="reset" class="button" value="Reset" /></td>
  </tr>
</table>
</form>
<br><br>

<div class="container1"> <?php

if(isset($_POST["Calculate"]))
{	

	//Define variables and give initial values.  

	 //Read user value to variable.  
		$height = $_POST['height'];


	//Read user value to variable.  
		$weight = $_POST['weight'];
		
		//echo $height;
		//echo $weight;

		//Check if height is valid. First uservalue is translated into floavalue.   
		//If given value is not valid float, result of floatval-function is zero.  
		//If conversion translated into string and original input value are the same, input is correct. 
 
	if($height!=strval(floatval($height)))   
	{   
		//Print error message and hyperlink.  
		
		print "Height is invalid<br><br>";  
    		print "<a href='BMI.php'>Go Back to Enter Values</a>";  
		//Execution of this script is terminated at this point.  
		exit;  
	}  

 
	if ($height<0 || $height>2.5)  
	{  
	   echo "Height must be value between 0 and 2.5<br><br>";  
    	   print "<a href='BMI.html'>Go Back to Enter Values</a>";  
	   exit;  
	}  
  
	if ($weight!=strval(intval($weight)))   
	{  
    		print "Weight is invalid<br><br>";  
      		print "<a href='BMI.html'>Go Back to Enter Values</a>";  
		//Execution of this script is terminated at this point.
    		exit;  
	}  
 

	if ($weight<0 || $weight>500)  
	{
   		print "Weight must be value between 0 and 500<br><br>";  
		print "<a href='BMI.php'>Go Back to Enter Values</a>";  
	   	exit;   
	}  

	$bmi = round(($weight/($height * $height)),2);  
	
	print("<br><br><b><fieldset>Body mass index is $bmi</b>"); 
	
	echo "<br><br><b>";
	
	$result = '';
	
	if($bmi < 15){$result = 'Extremely Underweight';}
	if(15 <= $bmi && $bmi < 16){$result = 'Severely Underweight';}
	if(16 <= $bmi && $bmi < 18.5){$result = 'Underweight';}
	if(18.5 <= $bmi && $bmi < 25){$result = 'Normal (healthy weight)';}
	if(25 <= $bmi && $bmi < 30 ){$result = 'Overweight';}
	if(30 <= $bmi && $bmi < 35 ){$result = 'Obese Class I (Moderately obese)';}
	if(35 <= $bmi && $bmi < 40 ){$result = 'Obese Class II (Severely obese)';}
	if($bmi >= 40){$result = 'Obese Class III (Very severely obese)';}	
	echo $result."</b></fieldset>";
}
?> 
</div>
<br>
<br>
<div class="container1"> <strong>To check BMI Chart - </strong><a href="BMI_img.html" target="_blank"><strong>Click here</strong></a>
<center><a href="user_details2.php">Back To user registration page</a></center>
</div>
</body>  
</html> 

<?php
		
		$hostname = "localhost";
		$username = "root";
		$password = "prpassword"; 
		$dbname = "pruser";
		
		 $connect = mysql_connect($hostname,$username,$password, $dbname);
			if(!$connect)
				
					die('could not connect:'.mysql_error());
				
		 	 else
					
					echo '<h4><center>connected successfully</h4></center>';
					
		$db_selected = mysql_select_db($username,$connect);
			if(!$db_selected)
					
					die('<br> can\'t use Test :'.mysql_error());
				
			  else
			  		//echo '<h4><center>Database selected successfully</h4></center>';
?>

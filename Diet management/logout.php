<?php
session_start();
unset($_SESSION['sess_user']);
session_destroy();
  $message = "Successfully Logged Out";
  echo "<script type='text/javascript'> alert('$message'); 
                                        window.location = 'login.php';
        </script>";
     
?>

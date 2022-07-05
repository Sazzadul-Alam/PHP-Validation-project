<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in form</title>
</head>

<body>

    <?php

	$email = $emailErr = $pass = $passErr = $err = $arr1 = $flag = '';

	if ($_SERVER["REQUEST_METHOD"] === "POST") {
		function sanitize($data)
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}


		if (!empty($_POST['email'])&&!empty($_POST['pass'])) {
			$email = sanitize($_POST['email']);
			$pass = sanitize($_POST['pass']);
			$flag = 1;
		} 
		if (empty($_POST['pass'])) {
			$passErr = "* password required.";
			$flag = 0;
		} 
		if (empty($_POST['email'])) {
			$emailErr = "* email required.";
			$flag = 0;
		}
		if ($flag == 1) {
            if(file_exists('../content/admin.json')){
                $current_data = file_get_contents('../content/admin.json');  
                $arr = json_decode($current_data, true); 
				foreach($arr as $key => $value) {
					if($value["e-mail"]==$_POST["email"] && $value["pass"]==$_POST["pass"]){ 
						                  
						session_start();			        
	
						$email =$_POST["email"];
	
						$_SESSION['email'] = $email;
						header("Location: ../view/Admin.php"); 
						exit();                   
					}
					else{
						$err = "Wrong Email or Passaword";
						$_SESSION['emailErr'] = $emailErr;
						$_SESSION['passErr'] = $passErr;
						$_SESSION['err'] = $err;

						header("Location: ../view/logIn.php");
						exit();
					}				
				}
			}
        }
			
		else if ($emailErr || $passErr) {
			$_SESSION['emailErr'] = $emailErr;
			$_SESSION['passErr'] = $passErr;
			header("Location: ../view/logIn.php");
			exit();
		}
	}

	
	?>

</body>

</html> 
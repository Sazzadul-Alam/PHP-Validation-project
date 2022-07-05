<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
</head>
<body>
    <h1>User List</h1>
    <?php
        $handle = fopen("../content/restaurant.json","r"); 
        $fr=fread($handle,filesize("../content/restaurant.json")); 
        $arr1 = json_decode($fr);
    ?>
    <?php
        if($arr1===NULL){
            echo "<p>No records found.</p>";
        }
        else{
            echo "<table border='1'>";
            echo"<thead>";
            echo"<tr>";
            echo"<th>Name</th>";
            echo"<th>Address</th>";
            echo "<th>e-mail</th>";
            echo "<th>Phone Number</th>";
            echo"</tr>";
            echo"</thead>";
            echo"<tbody>";
            for($i =0;$i<count($arr1);$i++){
            echo"<tr>";
            echo"<td>".$arr1[$i]->Name ."</td>";
            echo"<td>".$arr1[$i]->Address ."</td>";
            echo"<td>".$arr1[$i]->email ."</td>";
            echo"<td>".$arr1[$i]->number ."</td>";
            echo"</tr>";
            }
            echo"</tbody>";
            echo"</table>";
        }
    ?>
    <br><br>
    <button><a href="../view/Admin.php" style="text-decoration:none">Go Back</a></button>  
    <button><a href="../view/FirstPage.php" style="text-decoration:none">Log Out</a></button> 
</body>
</html>
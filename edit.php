<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="ajaxcrud";
	
$con = mysqli_connect($servername, $username, $password,$dbname);

            $id = $_POST['id'];
            
            $bbb = mysqli_query($con,"SELECT * FROM data WHERE id='".$id."'");
            $result = mysqli_fetch_assoc($bbb); 
            echo json_encode($result);
            exit;
?>
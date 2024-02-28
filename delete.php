<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="ajaxcrud";
	
$con = mysqli_connect($servername, $username, $password,$dbname);
            $id = $_POST['id'];
        
            $bbb = mysqli_query($con,"DELETE FROM data WHERE id='".$id."'");
?>
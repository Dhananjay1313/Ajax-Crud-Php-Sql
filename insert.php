<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="ajaxcrud";
	
$con = mysqli_connect($servername, $username, $password, $dbname);

            $id = $_POST['id'];
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $animal = $_POST['animal'];
            // $hobbies = $_POST['hobbies'];
            $hobbies = implode(',', $_POST['hobbies']);
            
            if ($id != ""){
                $abc = "UPDATE data SET fullname='$fullname',email='$email',gender='$gender',animal='$animal',hobbies='$hobbies' WHERE id='".$id."'";
                $bbb = mysqli_query($con,$abc);
            } else {
                $sql = "INSERT INTO data(fullname, email, gender, animal, hobbies) VALUES('$fullname', '$email', '$gender', '$animal', '$hobbies')";
                $bbb = mysqli_query($con,$sql);
                $id = mysqli_insert_id($con);
            } 
            
?>
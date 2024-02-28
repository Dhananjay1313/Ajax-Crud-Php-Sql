<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="ajaxcrud";
	
$con = mysqli_connect($servername, $username, $password,$dbname);

if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}

print_r($_GET);
die;

$results_per_page = 5;  
$page_first_result = ($page-1) * $results_per_page;  

$query = "SELECT * FROM data";  
$result = mysqli_query($con, $query);  
$number_of_result = mysqli_num_rows($result);  
  
//determine the total number of pages available  
$number_of_page = ceil ($number_of_result / $results_per_page);  

for ($page = 1; $page <= $number_of_page; $page++) {
    $isActive = isset($_GET['page']) && $_GET['page'] == $page ? "active" : "";
    echo '<ul class="pagination"><li class="page-item ' . $isActive . '"><a class="page-link btn" href="new.html?page=' . $page . '">' . $page . '</a></li></ul>';
}

?>
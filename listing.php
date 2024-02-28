<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ajaxcrud";

$con = mysqli_connect($servername, $username, $password, $dbname);

$page = 1;
if (isset($_POST['page'])) {
	$page = $_POST['page'];
	if ($page == '') {
		$page = 1;
	}
}
$items = 5;

$offset = ($page - 1) * $items;

$query = "SELECT * FROM data";

if (isset($_POST['search'])) {
	$search = $_POST['search'];
	if ($search != '') {
		$query .= " WHERE fullname LIKE '%$search%' OR email LIKE '%$search%' OR gender LIKE '%$search%' OR animal LIKE '%$search%' OR hobbies LIKE '%$search%'";
	}
}
$result = mysqli_query($con, $query);
$numb = mysqli_num_rows($result);
$number_of_page = ceil($numb / $items);

if (isset($_POST['name'])) {
	$name = $_POST['name'];
}
if (isset($_POST['type'])) {
	$type = $_POST['type'];
}

if($name != '' && $type != ''){
	$query .= " ORDER BY  `data`.`" . $name . "` " . $type . "";
}

$query .= " LIMIT " . $offset . ',' . $items;

$result = mysqli_query($con, $query);

$bbb = [];
$value = "";
$pagination = "";
if ($result->num_rows > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$value .= "<tr>";
		$value .= "<td>" . $row['fullname'] . "</td>";
		$value .= "<td>" . $row['email'] . "</td>";
		$value .= "<td>" . $row['gender'] . "</td>";
		$value .= "<td>" . $row['animal'] . "</td>";
		$value .= "<td>" . $row['hobbies'] . "</td>";
		$value .= "<td><button class='btn btn-info' id='edit' data-id=" . $row['id'] . " style='border-radius: 10px;'>Edit</button><button class='btn btn-danger' id='delete' data-id=" . $row['id'] . " style='border-radius: 10px;'>Delete</button></td>";
		$value .= "</tr>";
	}
}
$bbb['tbody'] = $value;
$pagination .= '<ul class="pagination">';

// if ($page > 1) {
// $previous = $page - 1;
// $pagination .= '<li class="page-item" id="1"><span class="page-link">First Page</span></li>';
//   $pagination .= '<li class="page-item" id="'.$previous.'"><span class="page-link">Previous</span></li>';
// }

for ($i = 1; $i <= $number_of_page; $i++) {
	$active_class = ($i == $page) ? "active" : "";

	$pagination .= '<li class="page-item ' . $active_class . '"  id="' . $i . '" class="active"><span class="page-link">' . $i . '</span></li>';
}
// $pagination .= '<li class="page-item" id="' . $number_of_page . '"><span class="page-link">Last Page</span></li>';
$pagination .= '</ul>';

$bbb['pagination'] = $pagination;
echo json_encode($bbb);